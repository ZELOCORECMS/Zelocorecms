<?php

declare(strict_types=1);

namespace App\Services\Theme;

use App\Models\Option;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use ZipArchive;

class ThemeManager
{
    private string $themesPath;

    public function __construct()
    {
        $this->themesPath = base_path('themes');
    }

    /**
     * Boot the theme for the given workspace.
     */
    public function bootTheme(?string $workspaceId = null): void
    {
        try {
            $activeTheme = $this->getActiveThemeSlug($workspaceId);
        } catch (\Exception $e) {
            $activeTheme = 'default-theme';
        }

        if (! $this->themeExists($activeTheme)) {
            $activeTheme = 'default-theme';
        }

        $themeRoot = $this->getThemePath($activeTheme);
        $themeViewPath = $themeRoot.'/views';

        if (File::exists($themeViewPath)) {
            View::prependLocation($themeViewPath);
            View::addNamespace('theme', $themeViewPath);
        } elseif (File::exists($themeRoot.'/templates')) {
            // Support block themes with templates directory
            View::prependLocation($themeRoot.'/templates');
            View::addNamespace('theme', $themeRoot.'/templates');
        } else {
            // Fallback to theme root
            View::prependLocation($themeRoot);
            View::addNamespace('theme', $themeRoot);
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

        Option::set('theme.active', $themeSlug, $workspaceId);
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
            $slug = basename($dir);
            $stylePath = $dir.'/style.css';
            $jsonPath = $dir.'/theme.json';

            $hasStyle = File::exists($stylePath);
            $hasJson = File::exists($jsonPath);

            if ($hasStyle || $hasJson) {
                $meta = [
                    'name' => '',
                    'description' => '',
                    'author' => '',
                    'version' => '',
                ];

                if ($hasStyle) {
                    $meta = array_merge($meta, $this->parseStyleCss($stylePath));
                }

                if ($hasJson) {
                    $jsonData = json_decode(File::get($jsonPath), true);
                    if (is_array($jsonData)) {
                        $meta = array_merge($meta, $jsonData);
                        $meta['theme_json'] = $jsonData;
                    }
                }

                $meta['slug'] = $slug;

                if (empty($meta['name'])) {
                    $meta['name'] = Str::title(str_replace('-', ' ', $slug));
                }

                $themes[] = $meta;
            }
        }

        return $themes;
    }

    /**
     * Check if a theme exists and is valid.
     */
    public function themeExists(string $slug): bool
    {
        $path = $this->getThemePath($slug);

        return File::exists($path.'/style.css') || File::exists($path.'/theme.json');
    }

    /**
     * Get the absolute path to a theme.
     */
    public function getThemePath(string $slug): string
    {
        return $this->themesPath.'/'.$slug;
    }

    /**
     * Parse WordPress-style style.css headers
     */
    private function parseStyleCss(string $path): array
    {
        $data = [
            'name' => '',
            'theme_uri' => '',
            'description' => '',
            'author' => '',
            'author_uri' => '',
            'version' => '',
            'text_domain' => '',
        ];

        if (! File::exists($path)) {
            return $data;
        }

        $fp = fopen($path, 'r');
        if (! $fp) {
            return $data;
        }

        $content = fread($fp, 8192);
        fclose($fp);

        $content = str_replace("\r", "\n", $content);

        $headers = [
            'name' => 'Theme Name',
            'theme_uri' => 'Theme URI',
            'description' => 'Description',
            'author' => 'Author',
            'author_uri' => 'Author URI',
            'version' => 'Version',
            'text_domain' => 'Text Domain',
        ];

        foreach ($headers as $key => $regex) {
            if (preg_match('/^[ \t\/*#@]*'.preg_quote($regex, '/').':(.*)$/mi', $content, $match)) {
                $data[$key] = trim(preg_replace('/\s*(?:\*\/|\?>).*/', '', $match[1]));
            }
        }

        return $data;
    }

    /**
     * Install a new theme from an uploaded zip file.
     */
    public function installTheme(UploadedFile $file): array
    {
        if ($file->getClientOriginalExtension() !== 'zip' && $file->getMimeType() !== 'application/zip') {
            throw new \InvalidArgumentException('Uploaded file must be a zip archive.');
        }

        $zip = new ZipArchive;
        if ($zip->open($file->getRealPath()) !== true) {
            throw new \RuntimeException('Failed to open zip archive.');
        }

        $tempExtractPath = storage_path('app/temp-theme-extract-'.uniqid());
        File::makeDirectory($tempExtractPath, 0755, true);

        $zip->extractTo($tempExtractPath);
        $zip->close();

        // Find the root theme folder (which should contain style.css)
        $directories = File::directories($tempExtractPath);
        $themeDir = null;

        if (count($directories) === 1 && File::exists($directories[0].'/style.css')) {
            $themeDir = $directories[0];
        } elseif (File::exists($tempExtractPath.'/style.css')) {
            $themeDir = $tempExtractPath;
        }

        if (! $themeDir) {
            File::deleteDirectory($tempExtractPath);
            throw new \RuntimeException('Invalid theme format: missing style.css in theme root.');
        }

        $slug = basename($themeDir);

        // If extracted directly to temp path without a wrapper directory, we need a slug
        if ($themeDir === $tempExtractPath) {
            $meta = $this->parseStyleCss($themeDir.'/style.css');
            $slug = ! empty($meta['text_domain']) ? $meta['text_domain'] : Str::slug($meta['name'] ?? 'uploaded-theme');
        }

        if ($this->themeExists($slug)) {
            File::deleteDirectory($tempExtractPath);
            throw new \RuntimeException("Theme [{$slug}] is already installed.");
        }

        $finalDestination = $this->themesPath.'/'.$slug;
        File::moveDirectory($themeDir, $finalDestination);

        if (File::exists($tempExtractPath)) {
            File::deleteDirectory($tempExtractPath);
        }

        $meta = $this->parseStyleCss($finalDestination.'/style.css');
        $meta['slug'] = $slug;

        return $meta;
    }

    /**
     * Delete an installed theme.
     */
    public function deleteTheme(string $slug): void
    {
        if ($slug === 'default-theme') {
            throw new \RuntimeException('Cannot delete the default theme.');
        }

        if (! $this->themeExists($slug)) {
            throw new \InvalidArgumentException("Theme [{$slug}] does not exist.");
        }

        File::deleteDirectory($this->getThemePath($slug));
    }
}
