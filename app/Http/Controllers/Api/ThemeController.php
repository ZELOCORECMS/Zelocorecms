<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Theme\ThemeManager;
use App\Services\Theme\ThemeUpdater;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function __construct(
        private readonly ThemeManager $themeManager,
        private readonly ThemeUpdater $themeUpdater
    ) {
        $this->middleware('can:super-admin');
    }

    public function index(Request $request, string $workspaceSlug): JsonResponse
    {
        $themes = $this->themeManager->getInstalledThemes();
        $activeSlug = $this->themeManager->getActiveThemeSlug($request->workspace_id);

        foreach ($themes as &$theme) {
            $theme['is_active'] = ($theme['slug'] === $activeSlug);
        }

        return response()->json([
            'success' => true,
            'data' => $themes,
        ]);
    }

    public function install(Request $request, string $workspaceSlug): JsonResponse
    {
        $request->validate([
            'theme' => 'required|file|mimes:zip|max:51200', // max 50MB
        ]);

        try {
            $themeData = $this->themeManager->installTheme($request->file('theme'));

            return response()->json([
                'success' => true,
                'message' => "Theme {$themeData['name']} installed successfully.",
                'data' => $themeData,
            ]);
        } catch (\InvalidArgumentException $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        } catch (\RuntimeException $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 422);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An unexpected error occurred during installation.'], 500);
        }
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

    public function update(Request $request, string $workspaceSlug, string $themeSlug): JsonResponse
    {
        try {
            $success = $this->themeUpdater->updateTheme($themeSlug);

            if ($success) {
                return response()->json(['success' => true, 'message' => "Theme {$themeSlug} updated successfully."]);
            }

            return response()->json(['success' => false, 'message' => 'No updates available or update failed.'], 400);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Update failed: '.$e->getMessage()], 500);
        }
    }

    public function destroy(Request $request, string $workspaceSlug, string $themeSlug): JsonResponse
    {
        try {
            $this->themeManager->deleteTheme($themeSlug);

            return response()->json(['success' => true, 'message' => "Theme {$themeSlug} deleted successfully."]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }
    }
}
