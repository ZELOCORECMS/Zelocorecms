<?php

/**
 * ZELOCORECMS — Workspace Middleware
 * Resolves workspace from route slug and injects it into the request.
 *
 * @license GPL-2.0-or-later
 */

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\Workspace;
use App\Models\WorkspaceMember;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WorkspaceMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $slug = $request->route('workspaceSlug');

        if (! $slug) {
            return response()->json([
                'success' => false,
                'message' => 'Workspace slug is required.',
            ], 400);
        }

        $workspace = Workspace::where('slug', $slug)->first();

        if (! $workspace) {
            return response()->json([
                'success' => false,
                'message' => "Workspace [{$slug}] not found.",
            ], 404);
        }

        $user = $request->user();

        // Super admins can access all workspaces
        if ($user && $user->is_super_admin) {
            $request->merge(['workspace_id' => $workspace->id]);
            $request->attributes->set('workspace', $workspace);

            return $next($request);
        }

        // Check user is a member of this workspace
        $membership = WorkspaceMember::where('workspace_id', $workspace->id)
            ->where('user_id', $user?->id)
            ->with('role')
            ->first();

        if (! $membership) {
            return response()->json([
                'success' => false,
                'message' => 'You do not have access to this workspace.',
            ], 403);
        }

        // Inject workspace context into request
        $request->merge([
            'workspace_id' => $workspace->id,
            'workspace_role' => $membership->role,
        ]);
        $request->attributes->set('workspace', $workspace);
        $request->attributes->set('membership', $membership);

        return $next($request);
    }
}
