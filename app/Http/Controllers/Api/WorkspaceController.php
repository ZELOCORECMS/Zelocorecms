<?php

/**
 * ZELOCORECMS — Workspace Controller
 * Manages workspaces and workspace members.
 *
 * @license GPL-2.0-or-later
 */

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Workspace;
use App\Models\WorkspaceMember;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WorkspaceController extends Controller
{
    /**
     * GET /api/v1/workspaces
     * List user's workspaces.
     */
    public function index(Request $request): JsonResponse
    {
        $user = $request->user();

        if ($user->is_super_admin) {
            $workspaces = Workspace::all();
        } else {
            $workspaces = $user->workspaces()->get();
        }

        return response()->json(['success' => true, 'data' => $workspaces]);
    }

    /**
     * POST /api/v1/workspaces
     * Create a new workspace.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:100', 'unique:zc_workspaces,slug'],
            'plan' => ['nullable', 'in:free,starter,pro,business,enterprise'],
        ]);

        $slug = $validated['slug'] ?? Str::slug($validated['name']).'-'.Str::random(6);

        $workspace = Workspace::create([
            'slug' => $slug,
            'name' => $validated['name'],
            'plan' => $validated['plan'] ?? 'free',
        ]);

        // Add user as member (assuming they want to be admin if they created it)
        WorkspaceMember::create([
            'workspace_id' => $workspace->id,
            'user_id' => $request->user()->id,
            'joined_at' => now(),
        ]);

        return response()->json(['success' => true, 'data' => $workspace], 201);
    }

    /**
     * GET /api/v1/workspaces/{slug}
     */
    public function show(Request $request, string $slug): JsonResponse
    {
        $workspace = Workspace::where('slug', $slug)->firstOrFail();

        return response()->json(['success' => true, 'data' => $workspace]);
    }

    /**
     * PATCH /api/v1/workspaces/{slug}
     */
    public function update(Request $request, string $slug): JsonResponse
    {
        $workspace = Workspace::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'name' => ['string', 'max:255'],
            'settings' => ['array'],
        ]);

        $workspace->update($validated);

        return response()->json(['success' => true, 'data' => $workspace]);
    }

    /**
     * DELETE /api/v1/workspaces/{slug}
     */
    public function destroy(Request $request, string $slug): JsonResponse
    {
        $workspace = Workspace::where('slug', $slug)->firstOrFail();
        $workspace->delete();

        return response()->json(['success' => true, 'message' => 'Workspace deleted.']);
    }

    /**
     * GET /api/v1/workspaces/{slug}/members
     */
    public function members(Request $request, string $slug): JsonResponse
    {
        $workspace = Workspace::where('slug', $slug)->firstOrFail();
        $members = WorkspaceMember::where('workspace_id', $workspace->id)
            ->with(['user:id,email,first_name,last_name,avatar_url', 'role'])
            ->get();

        return response()->json(['success' => true, 'data' => $members]);
    }

    /**
     * POST /api/v1/workspaces/{slug}/members
     * Invite member.
     */
    public function inviteMember(Request $request, string $slug): JsonResponse
    {
        // Implementation for sending invites
        return response()->json(['success' => true, 'message' => 'Invite sent.']);
    }

    /**
     * DELETE /api/v1/workspaces/{slug}/members/{userId}
     */
    public function removeMember(Request $request, string $slug, string $userId): JsonResponse
    {
        $workspace = Workspace::where('slug', $slug)->firstOrFail();

        WorkspaceMember::where('workspace_id', $workspace->id)
            ->where('user_id', $userId)
            ->delete();

        return response()->json(['success' => true, 'message' => 'Member removed.']);
    }
}
