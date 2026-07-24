<?php

declare(strict_types=1);

namespace App\Services\Theme;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use ZipArchive;

class ThemeUpdater
{
    private ThemeManager $themeManager;

    public function __construct(ThemeManager $themeManager)
    {
        $this->themeManager = $themeManager;
    }

    /**
     * Check if an update is available for the given theme.
     *
     * @return array|null Returns ['version' => '...', 'download_url' => '...'] or null if no update.
     */
    public function checkForUpdates(string $themeSlug): ?array
    {
        if (! $this->themeManager->themeExists($themeSlug)) {
            return null;
        }

        $themePath = $this->themeManager->getThemePath($themeSlug);
        $jsonPath = $themePath.'/theme.json';
        $data = json_decode(File::get($jsonPath), true);

        if (empty($data['update_url'])) {
            return null;
        }

        try {
            $response = Http::timeout(10)->get($data['update_url']);

            if ($response->successful()) {
                $updateData = $response->json();

                if (isset($updateData['version']) && isset($updateData['download_url'])) {
                    // Simple version comparison
                    if (version_compare($updateData['version'], $data['version'], '>')) {
                        return [
                            'version' => $updateData['version'],
                            'download_url' => $updateData['download_url'],
                        ];
                    }
                }
            }
        } catch (\Exception $e) {
            // Log error or silently fail if update server is unreachable
        }

        return null;
    }

    /**
     * Update the theme to the latest version.
     */
    public function updateTheme(string $themeSlug): bool
    {
        $updateData = $this->checkForUpdates($themeSlug);

        if (! $updateData) {
            return false; // No update available
        }

        $themePath = $this->themeManager->getThemePath($themeSlug);

        try {
            // 1. Download the new version ZIP
            $zipContent = Http::timeout(30)->get($updateData['download_url'])->body();
            $tempZipPath = storage_path('app/temp-theme-'.$themeSlug.'.zip');
            File::put($tempZipPath, $zipContent);

            // 2. Backup the current theme
            $backupPath = storage_path('app/theme-backups/'.$themeSlug.'-'.time());
            File::ensureDirectoryExists(storage_path('app/theme-backups'));
            File::copyDirectory($themePath, $backupPath);

            // 3. Delete old theme files
            File::deleteDirectory($themePath);
            File::ensureDirectoryExists($themePath);

            // 4. Extract the new ZIP
            $zip = new ZipArchive;
            if ($zip->open($tempZipPath) === true) {
                $zip->extractTo($themePath);
                $zip->close();
            } else {
                // Restore backup if extraction fails
                File::deleteDirectory($themePath);
                File::copyDirectory($backupPath, $themePath);
                File::delete($tempZipPath);

                return false;
            }

            // Cleanup
            File::delete($tempZipPath);

            return true;

        } catch (\Exception $e) {
            // If anything goes wrong, try to restore from backup if it was created
            if (isset($backupPath) && File::exists($backupPath)) {
                if (File::exists($themePath)) {
                    File::deleteDirectory($themePath);
                }
                File::copyDirectory($backupPath, $themePath);
            }
            if (isset($tempZipPath) && File::exists($tempZipPath)) {
                File::delete($tempZipPath);
            }

            return false;
        }
    }
}
