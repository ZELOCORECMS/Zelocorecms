<?php

/**
 * ZELOCORECMS — Main CMS Service Provider
 * Bootstraps the ZELOCORECMS core services into Laravel.
 *
 * @license GPL-2.0-or-later
 */

declare(strict_types=1);

namespace App\Providers;

use App\Console\Commands\ZeloCmsInfo;
use App\Services\Auth\JwtService;
use App\Services\Content\ContentItemService;
use App\Services\Content\ContentTypeService;
use App\Services\Hooks\HookRegistry;
use App\Services\Media\MediaService;
use App\Services\Plugin\PluginManager;
use App\Services\Plugin\PluginSandbox;
use App\Services\Theme\ThemeManager;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class ZeloCmsServiceProvider extends ServiceProvider
{
    /**
     * Register ZELOCORECMS services into the DI container.
     */
    public function register(): void
    {
        // Core CMS services
        $this->app->singleton(HookRegistry::class, fn () => new HookRegistry);
        $this->app->singleton(PluginSandbox::class, fn () => new PluginSandbox);
        $this->app->singleton(ContentTypeService::class);
        $this->app->singleton(ContentItemService::class);
        $this->app->singleton(MediaService::class);
        $this->app->singleton(JwtService::class);
        $this->app->singleton(ThemeManager::class, fn () => new ThemeManager);

        // Plugin Manager depends on HookRegistry and PluginSandbox
        $this->app->singleton(
            PluginManager::class,
            fn ($app) => new PluginManager(
                hooks: $app->make(HookRegistry::class),
                sandbox: $app->make(PluginSandbox::class),
            )
        );

        // Merge ZELOCORECMS config
        $this->mergeConfigFrom(__DIR__.'/../../config/zelocms.php', 'zelocms');
    }

    /**
     * Bootstrap ZELOCORECMS after all services are registered.
     */
    public function boot(): void
    {
        // Fix default string length for older MySQL versions
        Schema::defaultStringLength(191);

        // Boot theme
        try {
            // We'll boot it for the global scope if not handling a specific workspace yet
            $this->app->make(ThemeManager::class)->bootTheme();
        } catch (\Exception $e) {
            // Ignore during setup/migrations
        }

        // Load ZELOCORECMS routes
        $this->loadRoutes();

        // Load migrations
        $this->loadMigrationsFrom(database_path('migrations'));

        // Publish config files
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/zelocms.php' => config_path('zelocms.php'),
            ], 'zelocms-config');

            // Register Artisan commands
            $this->commands([
                ZeloCmsInfo::class,
            ]);
        }
    }

    private function loadRoutes(): void
    {
        // API routes
        $this->app->make('router')->group([
            'prefix' => 'api/v1',
            'middleware' => ['api'],
        ], function () {
            require base_path('routes/api.php');
        });

        // Admin routes (SPA — serves Vue.js admin)
        $this->app->make('router')->group([
            'prefix' => config('app.cms.admin_path', 'admin'),
            'middleware' => ['web'],
        ], function () {
            require base_path('routes/admin.php');
        });
    }
}
