<?php
/**
 * ZELOCORECMS — User Controller
 * Manages users and roles within a workspace.
 *
 * @license GPL-2.0-or-later
 */

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\WorkspaceMember;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * GET /api/v1/workspaces/{slug}/users
     */
    public function index(Request $request): JsonResponse
    {
        $workspaceId = $request->workspace_id;

        $members = WorkspaceMember::where('workspace_id', $workspaceId)
            ->with(['user', 'role'])
            ->get()
            ->map(fn($m) => [
                'id' => $m->user->id,
                'email' => $m->user->email,
                'first_name' => $m->user->first_name,
                'last_name' => $m->user->last_name,
                'role' => $m->role,
                'joined_at' => $m->joined_at,
            ]);

        return response()->json(['success' => true, 'data' => $members]);
    }

    /**
     * GET /api/v1/workspaces/{slug}/users/{id}
     */
    public function show(Request $request, string $id): JsonResponse
    {
        $workspaceId = $request->workspace_id;

        $member = WorkspaceMember::where('workspace_id', $workspaceId)
            ->where('user_id', $id)
            ->with(['user', 'role'])
            ->firstOrFail();

        return response()->json(['success' => true, 'data' => [
            'id' => $member->user->id,
            'email' => $member->user->email,
            'first_name' => $member->user->first_name,
            'last_name' => $member->user->last_name,
            'role' => $member->role,
            'joined_at' => $member->joined_at,
        ]]);
    }

    /**
     * PATCH /api/v1/workspaces/{slug}/users/{id}
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $workspaceId = $request->workspace_id;

        $member = WorkspaceMember::where('workspace_id', $workspaceId)
            ->where('user_id', $id)
            ->firstOrFail();

        $validated = $request->validate([
            'role_id' => ['nullable', 'uuid', 'exists:zc_roles,id'],
        ]);

        if (array_key_exists('role_id', $validated)) {
            $member->update(['role_id' => $validated['role_id']]);
        }

        return response()->json(['success' => true, 'data' => $member->load('role')]);
    }

    /**
     * DELETE /api/v1/workspaces/{slug}/users/{id}
     */
    public function destroy(Request $request, string $id): JsonResponse
    {
        $workspaceId = $request->workspace_id;

        WorkspaceMember::where('workspace_id', $workspaceId)
            ->where('user_id', $id)
            ->delete();

        return response()->json(['success' => true, 'message' => 'User removed from workspace.']);
    }

    // ─── Roles ──────────────────────────────────────────────────────────────

    public function indexRoles(Request $request): JsonResponse
    {
        $roles = Role::where('workspace_id', $request->workspace_id)->get();
        return response()->json(['success' => true, 'data' => $roles]);
    }

    public function storeRole(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'permissions' => ['required', 'array'],
        ]);

        $role = Role::create([
            'workspace_id' => $request->workspace_id,
            'name' => $validated['name'],
            'permissions' => $validated['permissions'],
            'is_system' => false,
        ]);

        return response()->json(['success' => true, 'data' => $role], 201);
    }

    public function updateRole(Request $request, string $id): JsonResponse
    {
        $role = Role::where('workspace_id', $request->workspace_id)->findOrFail($id);

        if ($role->is_system) {
            return response()->json(['success' => false, 'message' => 'Cannot modify system role.'], 403);
        }

        $validated = $request->validate([
            'name' => ['string', 'max:100'],
            'permissions' => ['array'],
        ]);

        $role->update($validated);

        return response()->json(['success' => true, 'data' => $role]);
    }

    public function destroyRole(Request $request, string $id): JsonResponse
    {
        $role = Role::where('workspace_id', $request->workspace_id)->findOrFail($id);

        if ($role->is_system) {
            return response()->json(['success' => false, 'message' => 'Cannot delete system role.'], 403);
        }

        $role->delete();

        return response()->json(['success' => true, 'message' => 'Role deleted.']);
    }
}
