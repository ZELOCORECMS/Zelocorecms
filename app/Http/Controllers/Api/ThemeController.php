<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Theme\ThemeManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function __construct(
        private readonly ThemeManager $themeManager
    ) {}

    public function index(Request $request, string $workspaceSlug): JsonResponse
    {
        $themes = $this->themeManager->getInstalledThemes();
        $activeSlug = $this->themeManager->getActiveThemeSlug($request->workspace_id);
        
        foreach ($themes as &$theme) {
            $theme['is_active'] = ($theme['slug'] === $activeSlug);
        }

        return response()->json(['success' => true, 'data' => $themes]);
    }

    public function install(Request $request, string $workspaceSlug): JsonResponse
    {
        // Mock install process
        return response()->json(['success' => false, 'message' => 'Theme upload/install not yet implemented.'], 501);
    }

    public function activate(Request $request, string $workspaceSlug, string $themeSlug): JsonResponse
    {
        try {
            $this->themeManager->setActiveTheme($themeSlug, $request->workspace_id);
            return response()->json(['success' => true, 'message' => "Theme {$themeSlug} activated."]);
        } catch (\InvalidArgumentException $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }
}
