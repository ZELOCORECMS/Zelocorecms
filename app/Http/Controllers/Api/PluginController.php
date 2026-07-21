<?php
/**
 * ZELOCORECMS — Plugin Controller
 * Manages plugin installation, activation, and configuration.
 *
 * @license GPL-2.0-or-later
 */

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plugin;
use App\Services\Plugin\PluginManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PluginController extends Controller
{
    public function __construct(
        private readonly PluginManager $pluginManager
    ) {}

    /**
     * GET /api/v1/workspaces/{slug}/plugins
     */
    public function index(Request $request): JsonResponse
    {
        $plugins = Plugin::where('workspace_id', $request->workspace_id)
            ->orWhereNull('workspace_id') // Network-wide plugins
            ->get();

        return response()->json(['success' => true, 'data' => $plugins]);
    }

    /**
     * POST /api/v1/workspaces/{slug}/plugins/install
     */
    public function install(Request $request): JsonResponse
    {
        // Placeholder for plugin upload/install logic
        return response()->json(['success' => false, 'message' => 'Not implemented.'], 501);
    }

    /**
     * POST /api/v1/workspaces/{slug}/plugins/{slug}/activate
     */
    public function activate(Request $request, string $slug): JsonResponse
    {
        $plugin = Plugin::where('slug', $slug)
            ->where(function ($q) use ($request) {
                $q->where('workspace_id', $request->workspace_id)->orWhereNull('workspace_id');
            })
            ->firstOrFail();

        $plugin->update(['status' => 'active']);

        return response()->json(['success' => true, 'message' => "Plugin {$slug} activated.", 'data' => $plugin]);
    }

    /**
     * POST /api/v1/workspaces/{slug}/plugins/{slug}/deactivate
     */
    public function deactivate(Request $request, string $slug): JsonResponse
    {
        $plugin = Plugin::where('slug', $slug)
            ->where(function ($q) use ($request) {
                $q->where('workspace_id', $request->workspace_id)->orWhereNull('workspace_id');
            })
            ->firstOrFail();

        $plugin->update(['status' => 'inactive']);

        return response()->json(['success' => true, 'message' => "Plugin {$slug} deactivated.", 'data' => $plugin]);
    }

    /**
     * DELETE /api/v1/workspaces/{slug}/plugins/{slug}
     */
    public function destroy(Request $request, string $slug): JsonResponse
    {
        // Placeholder for plugin uninstall logic
        return response()->json(['success' => false, 'message' => 'Not implemented.'], 501);
    }

    /**
     * GET /api/v1/workspaces/{slug}/plugins/{slug}/settings
     */
    public function settings(Request $request, string $slug): JsonResponse
    {
        $plugin = Plugin::where('slug', $slug)
            ->where('workspace_id', $request->workspace_id)
            ->firstOrFail();

        return response()->json(['success' => true, 'data' => $plugin->config ?? []]);
    }

    /**
     * PATCH /api/v1/workspaces/{slug}/plugins/{slug}/settings
     */
    public function updateSettings(Request $request, string $slug): JsonResponse
    {
        $plugin = Plugin::where('slug', $slug)
            ->where('workspace_id', $request->workspace_id)
            ->firstOrFail();

        $plugin->update(['config' => $request->all()]);

        return response()->json(['success' => true, 'message' => "Plugin {$slug} settings updated.", 'data' => $plugin->config]);
    }
}
