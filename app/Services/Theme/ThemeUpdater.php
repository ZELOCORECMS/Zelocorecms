<?php

declare(strict_types=1);

namespace App\Services\Theme;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
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

        if (! File::exists($jsonPath)) {
            return null;
        }

        $data = json_decode(File::get($jsonPath), true);

        if (empty($data['update_url'])) {
            return null;
        }

        try {
            $response = Http::timeout(10)->get($data['update_url']);

            if ($response->successful()) {
                $updateData = $response->json();

                if (isset($updateData['version']) && isset($updateData['download_url'])) {
                    if (version_compare($updateData['version'], $data['version'], '>')) {
                        return [
                            'version' => $updateData['version'],
                            'download_url' => $updateData['download_url'],
                        ];
                    }
                }
            }
        } catch (\Exception $e) {
            Log::warning('Theme update check failed for '.$themeSlug.': '.$e->getMessage());
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
        $backupPath = null;
        $tempZipPath = null;

        try {
            $backupPath = storage_path('app/theme-backups/'.$themeSlug.'-'.time());
            $tempZipPath = storage_path('app/temp-theme-'.$themeSlug.'.zip');

            // 1. Backup the current theme first
            File::ensureDirectoryExists(storage_path('app/theme-backups'));
            File::copyDirectory($themePath, $backupPath);

            // 2. Download the new version ZIP
            $zipContent = Http::timeout(30)->get($updateData['download_url'])->body();
            File::put($tempZipPath, $zipContent);

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

            // 5. Cleanup temp and backup
            File::delete($tempZipPath);
            File::deleteDirectory($backupPath);

            return true;

        } catch (\Exception $e) {
            // If anything goes wrong, try to restore from backup if it was created
            if ($backupPath && File::exists($backupPath)) {
                if (File::exists($themePath)) {
                    File::deleteDirectory($themePath);
                }
                File::copyDirectory($backupPath, $themePath);
            }
            if ($tempZipPath && File::exists($tempZipPath)) {
                File::delete($tempZipPath);
            }

            return false;
        }
    }
}
