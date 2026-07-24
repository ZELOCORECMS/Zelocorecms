<?php

declare(strict_types=1);

namespace App\Services\Theme;

use App\Models\Option;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class ThemeManager
{
    private string $themesPath;

    public function __construct()
    {
        $this->themesPath = base_path('themes');
    }

    /**
     * Boot the theme for the given workspace.
     * Sets the view paths to prioritize the active theme.
     */
    public function bootTheme(?string $workspaceId = null): void
    {
        try {
            $activeTheme = $this->getActiveThemeSlug($workspaceId);
        } catch (\Exception $e) {
            // DB might not be ready, fallback to default
            $activeTheme = 'default-theme';
        }

        if (! $this->themeExists($activeTheme)) {
            $activeTheme = 'default-theme';
        }

        $themeViewPath = $this->getThemePath($activeTheme).'/views';

        if (File::exists($themeViewPath)) {
            // Add theme views to the view finder
            View::prependLocation($themeViewPath);
            // Also register a namespace
            View::addNamespace('theme', $themeViewPath);
        }
    }

    /**
     * Get the currently active theme slug for the workspace.
     */
    public function getActiveThemeSlug(?string $workspaceId = null): string
    {
        $query = Option::where('option_key', 'theme.active');

        if ($workspaceId) {
            $query->where('workspace_id', $workspaceId);
        } else {
            $query->whereNull('workspace_id');
        }

        $option = $query->first();

        // Default to 'default-theme' if none is set
        return $option->option_value ?? 'default-theme';
    }

    /**
     * Set the active theme for the workspace.
     */
    public function setActiveTheme(string $themeSlug, ?string $workspaceId = null): void
    {
        if (! $this->themeExists($themeSlug)) {
            throw new \InvalidArgumentException("Theme [{$themeSlug}] does not exist.");
        }

        Option::updateOrCreate(
            [
                'option_key' => 'theme.active',
                'workspace_id' => $workspaceId,
            ],
            [
                'option_value' => $themeSlug,
            ]
        );
    }

    /**
     * Get a list of all installed themes.
     */
    public function getInstalledThemes(): array
    {
        $themes = [];

        if (! File::exists($this->themesPath)) {
            return $themes;
        }

        $directories = File::directories($this->themesPath);

        foreach ($directories as $dir) {
            $jsonPath = $dir.'/theme.json';
            if (File::exists($jsonPath)) {
                $data = json_decode(File::get($jsonPath), true);
                if ($data) {
                    $data['slug'] = basename($dir); // ensure slug is directory name
                    $themes[] = $data;
                }
            }
        }

        return $themes;
    }

    /**
     * Check if a theme exists and is valid.
     */
    public function themeExists(string $slug): bool
    {
        $jsonPath = $this->getThemePath($slug).'/theme.json';

        return File::exists($jsonPath);
    }

    /**
     * Get the absolute path to a theme.
     */
    public function getThemePath(string $slug): string
    {
        return $this->themesPath.'/'.$slug;
    }
}
