<?php
/**
 * ZELOCORECMS — Hook Service Provider
 * Registers built-in hook definitions and loads plugin hooks.
 *
 * @license GPL-2.0-or-later
 */

declare(strict_types=1);

namespace App\Providers;

use App\Services\Hooks\HookRegistry;
use Illuminate\Support\ServiceProvider;

class HookServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        /** @var HookRegistry $hooks */
        $hooks = $this->app->make(HookRegistry::class);

        // Register built-in hooks
        $this->registerBuiltInHooks($hooks);
    }

    /**
     * Register ZELOCORECMS built-in hook definitions.
     * These are the canonical hook names that plugins can use.
     *
     * Naming convention: {context}.{event}[.{modifier}]
     * Examples: content.beforeCreate, media.afterUpload, user.login
     */
    private function registerBuiltInHooks(HookRegistry $hooks): void
    {
        // ─── Content Hooks (Filters) ─────────────────────────────────────
        // These filters allow plugins to modify content before/after operations

        // content.schema — Modify content type schema definition
        // Args: (array $schema, string $contentTypeSlug)
        // Return: Modified $schema

        // content.beforeCreate — Modify content data before creation
        // Args: (array $data, string $contentTypeSlug)
        // Return: Modified $data

        // content.beforeUpdate — Modify content data before update
        // Args: (array $data, string $contentTypeSlug, string $itemId)
        // Return: Modified $data

        // content.beforePublish — Modify content before publishing
        // Args: (array $data, string $contentTypeSlug)
        // Return: Modified $data

        // api.response.content — Modify API response for content
        // Args: (array $response, string $contentTypeSlug)
        // Return: Modified $response

        // ─── Content Hooks (Actions) ──────────────────────────────────────

        // content.afterCreate — After content item is created
        // Args: (ContentItem $item)

        // content.afterUpdate — After content item is updated
        // Args: (ContentItem $item, array $oldData)

        // content.afterPublish — After content item is published
        // Args: (ContentItem $item)

        // content.afterDelete — After content item is deleted
        // Args: (string $itemId, string $contentTypeSlug)

        // ─── Media Hooks ──────────────────────────────────────────────────

        // media.beforeUpload — Before file is processed
        // Action: (array $file) 

        // media.afterUpload — After file is uploaded and processed
        // Action: (Media $media)

        // media.beforeDelete
        // Action: (Media $media)

        // ─── Auth Hooks ────────────────────────────────────────────────────

        // auth.login — After user logs in
        // Action: (User $user, string $method)

        // auth.logout — After user logs out
        // Action: (User $user)

        // auth.register — After user registers
        // Action: (User $user)

        // ─── Admin UI Hooks ───────────────────────────────────────────────

        // admin.menu — Filter admin sidebar menu
        // Filter: (array $menuItems)
        // Return: Modified $menuItems

        // admin.dashboard.widgets — Add dashboard widgets
        // Filter: (array $widgets)
        // Return: Modified $widgets

        // ─── Plugin Lifecycle Hooks ───────────────────────────────────────

        // plugin.activate — When a plugin is activated
        // Action: (Plugin $plugin)

        // plugin.deactivate — When a plugin is deactivated
        // Action: (Plugin $plugin)

        // plugin.install — When a plugin is installed
        // Action: (Plugin $plugin)

        // plugin.uninstall — When a plugin is uninstalled
        // Action: (Plugin $plugin)

        // ─── System Hooks ─────────────────────────────────────────────────

        // system.init — CMS has fully booted
        // Action: ()

        // system.cron — Runs on scheduled cron (every minute)
        // Action: (Carbon $now)

        // Built-in filter: Add ZeloCMS info to all API responses
        $hooks->addFilter('api.response.meta', function (array $meta): array {
            $meta['zelocms_version'] = config('app.cms.version', '1.0.0');
            return $meta;
        }, 1);

        // Fire system.init action
        $hooks->doAction('system.init');
    }
}
