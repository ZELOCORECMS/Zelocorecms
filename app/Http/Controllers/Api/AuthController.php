<?php
/**
 * ZELOCORECMS — Authentication Controller
 * Handles registration, login, logout, and token refresh.
 *
 * @license GPL-2.0-or-later
 */

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Workspace;
use App\Models\WorkspaceMember;
use App\Models\Role;
use App\Services\Hooks\HookRegistry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct(
        private readonly HookRegistry $hooks,
    ) {}

    /**
     * POST /api/v1/auth/register
     * Register a new user (if registration is enabled).
     */
    public function register(Request $request): JsonResponse
    {
        if (!config('app.cms.allow_registration', false)) {
            return $this->error('User registration is disabled on this installation.', 403);
        }

        $validated = $request->validate([
            'email'      => ['required', 'email', 'max:255', 'unique:zc_users,email'],
            'password'   => ['required', 'string', 'min:12', 'confirmed'],
            'first_name' => ['nullable', 'string', 'max:100'],
            'last_name'  => ['nullable', 'string', 'max:100'],
        ]);

        $user = User::create([
            'email'         => strtolower($validated['email']),
            'password_hash' => Hash::make($validated['password']),
            'first_name'    => $validated['first_name'] ?? null,
            'last_name'     => $validated['last_name'] ?? null,
            'provider'      => 'local',
        ]);

        // Auto-create personal workspace
        $workspace = $this->createPersonalWorkspace($user);

        $this->hooks->doAction('auth.register', $user);

        $token = $user->createToken(
            'personal',
            ['*'],
            now()->addDays(30)
        )->plainTextToken;

        return $this->success([
            'user'         => $this->formatUser($user),
            'workspace'    => $workspace->only(['id', 'slug', 'name']),
            'access_token' => $token,
            'token_type'   => 'Bearer',
        ], 201);
    }

    /**
     * POST /api/v1/auth/login
     * Authenticate user and return access token.
     */
    public function login(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $email = strtolower($validated['email']);
        $ip = $request->ip();

        // Rate limiting: 5 attempts per email per 15 minutes
        $rateLimitKey = "login:{$email}:{$ip}";

        if (RateLimiter::tooManyAttempts($rateLimitKey, 5)) {
            $seconds = RateLimiter::availableIn($rateLimitKey);

            return $this->error(
                "Too many login attempts. Please try again in {$seconds} seconds.",
                429,
                ['retry_after' => $seconds]
            );
        }

        $user = User::where('email', $email)->first();

        if (!$user || !Hash::check($validated['password'], $user->password_hash)) {
            RateLimiter::hit($rateLimitKey, 900); // 15 min decay

            return $this->error('The provided credentials are incorrect.', 401);
        }

        // Clear rate limiter on success
        RateLimiter::clear($rateLimitKey);

        // Update last login timestamp
        $user->update(['last_login_at' => now()]);

        // Check MFA if enabled
        if ($user->mfa_enabled) {
            if (empty($request->mfa_code)) {
                return $this->success([
                    'requires_mfa'  => true,
                    'mfa_token'     => encrypt($user->id . '|' . now()->addMinutes(5)->timestamp),
                ], 200);
            }

            if (!$this->verifyMfaCode($user, $request->mfa_code)) {
                return $this->error('Invalid MFA code.', 401);
            }
        }

        // Revoke old tokens if remember is false
        if (!$request->boolean('remember')) {
            $user->tokens()->delete();
        }

        $expiry = $request->boolean('remember')
            ? now()->addDays(30)
            : now()->addHours(8);

        $token = $user->createToken('web-login', ['*'], $expiry)->plainTextToken;

        $this->hooks->doAction('auth.login', $user, 'local');

        return $this->success([
            'user'         => $this->formatUser($user),
            'access_token' => $token,
            'token_type'   => 'Bearer',
            'expires_at'   => $expiry->toISOString(),
        ]);
    }

    /**
     * POST /api/v1/auth/logout
     * Revoke current token.
     */
    public function logout(Request $request): JsonResponse
    {
        $user = $request->user();

        if ($user) {
            // Revoke current token only
            $request->user()->currentAccessToken()->delete();
            $this->hooks->doAction('auth.logout', $user);
        }

        return $this->success(['message' => 'Logged out successfully.']);
    }

    /**
     * GET /api/v1/auth/me
     * Get authenticated user's info.
     */
    public function me(Request $request): JsonResponse
    {
        $user = $request->user();

        if (!$user) {
            return $this->error('Unauthenticated.', 401);
        }

        return $this->success([
            'user'       => $this->formatUser($user),
            'workspaces' => $user->workspaceMembers()
                ->with('workspace', 'role')
                ->get()
                ->map(fn($m) => [
                    'workspace'   => $m->workspace->only(['id', 'slug', 'name', 'plan']),
                    'role'        => $m->role?->only(['id', 'name', 'permissions']),
                    'joined_at'   => $m->joined_at,
                ]),
        ]);
    }

    /**
     * POST /api/v1/auth/refresh
     * Refresh: revoke old token, issue new one.
     */
    public function refresh(Request $request): JsonResponse
    {
        $user = $request->user();

        if (!$user) {
            return $this->error('Unauthenticated.', 401);
        }

        $request->user()->currentAccessToken()->delete();

        $token = $user->createToken('web-login', ['*'], now()->addHours(8))->plainTextToken;

        return $this->success([
            'access_token' => $token,
            'token_type'   => 'Bearer',
            'expires_at'   => now()->addHours(8)->toISOString(),
        ]);
    }

    /**
     * POST /api/v1/auth/forgot-password
     */
    public function forgotPassword(Request $request): JsonResponse
    {
        $request->validate(['email' => ['required', 'email']]);

        // Always return success (don't reveal if email exists)
        $user = User::where('email', strtolower($request->email))->first();

        if ($user) {
            // In a full implementation, send a password reset email
            // dispatch(new SendPasswordResetEmail($user));
        }

        return $this->success([
            'message' => 'If that email address is registered, you will receive a password reset link shortly.',
        ]);
    }

    // ─── Private Helpers ────────────────────────────────────────────────────

    private function createPersonalWorkspace(User $user): Workspace
    {
        $slug = Str::slug($user->first_name ?? 'workspace') . '-' . Str::random(6);

        $workspace = Workspace::create([
            'slug' => $slug,
            'name' => ($user->first_name ? $user->first_name . "'s " : '') . 'Workspace',
            'plan' => 'free',
        ]);

        // Create admin role
        $adminRole = Role::create([
            'workspace_id' => $workspace->id,
            'name'         => 'Administrator',
            'permissions'  => ['*'], // Wildcard = all permissions
            'is_system'    => true,
        ]);

        // Add user as workspace admin
        WorkspaceMember::create([
            'workspace_id' => $workspace->id,
            'user_id'      => $user->id,
            'role_id'      => $adminRole->id,
            'joined_at'    => now(),
        ]);

        return $workspace;
    }

    private function verifyMfaCode(User $user, string $code): bool
    {
        if (!$user->mfa_secret) {
            return false;
        }

        $secret = decrypt($user->mfa_secret);

        // TOTP verification (RFC 6238)
        // In production, use a TOTP library like spomky-labs/otphp
        // For now, basic implementation
        $window = 1; // Allow 30 seconds drift
        $timeSlice = floor(time() / 30);

        for ($i = -$window; $i <= $window; $i++) {
            $calculated = $this->calculateTotp($secret, $timeSlice + $i);
            if (hash_equals($calculated, $code)) {
                return true;
            }
        }

        return false;
    }

    private function calculateTotp(string $secret, int $timeSlice): string
    {
        $key = base64_decode(strtr($secret, '-_', '+/') . str_repeat('=', 3 - (3 + strlen($secret)) % 4));
        $time = pack('N*', 0) . pack('N*', $timeSlice);
        $hmac = hash_hmac('sha1', $time, $key, true);
        $offset = ord($hmac[strlen($hmac) - 1]) & 0x0F;
        $code = (
            ((ord($hmac[$offset]) & 0x7F) << 24) |
            ((ord($hmac[$offset + 1]) & 0xFF) << 16) |
            ((ord($hmac[$offset + 2]) & 0xFF) << 8) |
            (ord($hmac[$offset + 3]) & 0xFF)
        ) % 1000000;

        return str_pad((string) $code, 6, '0', STR_PAD_LEFT);
    }

    private function formatUser(User $user): array
    {
        return [
            'id'             => $user->id,
            'email'          => $user->email,
            'first_name'     => $user->first_name,
            'last_name'      => $user->last_name,
            'avatar_url'     => $user->avatar_url,
            'is_super_admin' => $user->is_super_admin,
            'mfa_enabled'    => $user->mfa_enabled,
            'created_at'     => $user->created_at,
        ];
    }

    private function success(array $data, int $status = 200): JsonResponse
    {
        return response()->json(['success' => true, 'data' => $data], $status);
    }

    private function error(string $message, int $status = 400, array $extra = []): JsonResponse
    {
        return response()->json(array_merge(
            ['success' => false, 'message' => $message],
            $extra
        ), $status);
    }
}
