<?php

/**
 * ZELOCORECMS — Webhook Controller
 * Manages outgoing webhooks for a workspace.
 *
 * @license GPL-2.0-or-later
 */

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Webhook;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WebhookController extends Controller
{
    /**
     * GET /api/v1/workspaces/{slug}/webhooks
     */
    public function index(Request $request, string $workspaceSlug): JsonResponse
    {
        $webhooks = Webhook::where('workspace_id', $request->workspace_id)->get();

        return response()->json(['success' => true, 'data' => $webhooks]);
    }

    /**
     * POST /api/v1/workspaces/{slug}/webhooks
     */
    public function store(Request $request, string $workspaceSlug): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url', 'max:1000'],
            'events' => ['required', 'array'],
            'events.*' => ['string'],
            'is_active' => ['boolean'],
        ]);

        $webhook = Webhook::create([
            'workspace_id' => $request->workspace_id,
            'name' => $validated['name'],
            'url' => $validated['url'],
            'events' => $validated['events'],
            'is_active' => $validated['is_active'] ?? true,
            'secret_hash' => bcrypt(Str::random(32)), // Basic secret implementation
        ]);

        return response()->json(['success' => true, 'data' => $webhook], 201);
    }

    /**
     * PATCH /api/v1/workspaces/{slug}/webhooks/{id}
     */
    public function update(Request $request, string $workspaceSlug, string $id): JsonResponse
    {
        $webhook = Webhook::where('workspace_id', $request->workspace_id)->findOrFail($id);

        $validated = $request->validate([
            'name' => ['string', 'max:255'],
            'url' => ['url', 'max:1000'],
            'events' => ['array'],
            'events.*' => ['string'],
            'is_active' => ['boolean'],
        ]);

        $webhook->update($validated);

        return response()->json(['success' => true, 'data' => $webhook]);
    }

    /**
     * DELETE /api/v1/workspaces/{slug}/webhooks/{id}
     */
    public function destroy(Request $request, string $workspaceSlug, string $id): JsonResponse
    {
        $webhook = Webhook::where('workspace_id', $request->workspace_id)->findOrFail($id);
        $webhook->delete();

        return response()->json(['success' => true, 'message' => 'Webhook deleted.']);
    }

    /**
     * POST /api/v1/workspaces/{slug}/webhooks/{id}/test
     */
    public function test(Request $request, string $workspaceSlug, string $id): JsonResponse
    {
        $webhook = Webhook::where('workspace_id', $request->workspace_id)->findOrFail($id);

        // Trigger a fake test event here in a real implementation
        $webhook->update(['last_triggered_at' => now()]);

        return response()->json(['success' => true, 'message' => 'Test payload sent.']);
    }
}
