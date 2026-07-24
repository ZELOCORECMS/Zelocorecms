<?php

/**
 * ZELOCORECMS — Plugin Service Provider
 * Loads and activates all enabled plugins.
 *
 * @license GPL-2.0-or-later
 */

declare(strict_types=1);

namespace App\Providers;

use App\Services\Plugin\PluginManager;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class PluginServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        // Only load plugins if table exists (after migrations have run)
        if (! Schema::hasTable('zc_plugins')) {
            return;
        }

        try {
            /** @var PluginManager $manager */
            $manager = $this->app->make(PluginManager::class);
            $manager->bootAllActive();
        } catch (\Throwable $e) {
            // Log but don't crash the app if a plugin fails to load
            Log::error(
                'ZELOCMS: Plugin boot failed: '.$e->getMessage(),
                ['exception' => $e]
            );
        }
    }
}
