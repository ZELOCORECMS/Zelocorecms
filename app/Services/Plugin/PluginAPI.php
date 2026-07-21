<?php
/**
 * ZELOCORECMS — Plugin API
 * The restricted API exposed to plugins. Plugins CANNOT access the database,
 * filesystem, or framework directly — they can ONLY use this API.
 *
 * @license GPL-2.0-or-later
 */

declare(strict_types=1);

namespace App\Services\Plugin;

use App\Services\Hooks\HookRegistry;
use Illuminate\Support\Facades\Log;

class PluginAPI
{
    public function __construct(
        private readonly string $pluginSlug,
        private readonly array $permissions,
        private readonly HookRegistry $hooks,
    ) {}

    // ─── Hook System (always available) ────────────────────────────────────

    public function addAction(string $hook, callable $callback, int $priority = 10): void
    {
        $this->hooks->addAction($hook, $callback, $priority);
    }

    public function doAction(string $hook, mixed ...$args): void
    {
        $this->hooks->doAction($hook, ...$args);
    }

    public function addFilter(string $hook, callable $callback, int $priority = 10): mixed
    {
        $this->hooks->addFilter($hook, $callback, $priority);
        return null;
    }

    public function applyFilters(string $hook, mixed $value, mixed ...$args): mixed
    {
        return $this->hooks->applyFilters($hook, $value, ...$args);
    }

    // ─── Content API (requires content:read or content:write) ──────────────

    public function getContent(string $type, array $query = []): array
    {
        $this->requirePermission('content:read');

        return \App\Models\ContentItem::where('content_type_slug', $type)
            ->when(!empty($query['status']), fn($q) => $q->where('status', $query['status']))
            ->when(!empty($query['limit']), fn($q) => $q->limit($query['limit']))
            ->get()
            ->toArray();
    }

    public function createContent(string $type, array $data): array
    {
        $this->requirePermission('content:write');

        $item = \App\Models\ContentItem::create([
            'content_type_slug' => $type,
            'data'              => $data,
            'status'            => 'draft',
            'created_by_plugin' => $this->pluginSlug,
        ]);

        return $item->toArray();
    }

    // ─── Settings API (requires settings:read) ─────────────────────────────

    public function getSetting(string $key, mixed $default = null): mixed
    {
        $this->requirePermission('settings:read');

        return \App\Models\Option::where('option_key', "plugin.{$this->pluginSlug}.{$key}")
            ->value('option_value') ?? $default;
    }

    public function setSetting(string $key, mixed $value): void
    {
        $this->requirePermission('settings:read'); // write implies read

        \App\Models\Option::updateOrCreate(
            ['option_key' => "plugin.{$this->pluginSlug}.{$key}"],
            ['option_value' => is_array($value) ? json_encode($value) : (string) $value]
        );
    }

    // ─── Media API (requires media:read) ───────────────────────────────────

    public function getMedia(array $query = []): array
    {
        $this->requirePermission('media:read');

        return \App\Models\Media::when(
            !empty($query['mime_type']),
            fn($q) => $q->where('mime_type', 'like', $query['mime_type'] . '%')
        )->limit($query['limit'] ?? 20)->get()->toArray();
    }

    // ─── Admin UI API (requires admin:menu) ────────────────────────────────

    public function registerAdminMenu(array $menuItem): void
    {
        $this->requirePermission('admin:menu');

        // Store admin menu items for the admin UI to render
        $existing = json_decode(
            \App\Models\Option::where('option_key', 'admin.plugin_menus')->value('option_value') ?? '[]',
            true
        );

        $existing[] = array_merge($menuItem, ['plugin' => $this->pluginSlug]);

        \App\Models\Option::updateOrCreate(
            ['option_key' => 'admin.plugin_menus'],
            ['option_value' => json_encode($existing)]
        );
    }

    // ─── Email API (requires email:send) ───────────────────────────────────

    public function sendEmail(string $to, string $subject, string $body): void
    {
        $this->requirePermission('email:send');

        // Queue the email for safety (no blocking)
        dispatch(new \App\Jobs\SendPluginEmail(
            to: $to,
            subject: "[{$this->pluginSlug}] " . $subject,
            body: $body,
            pluginSlug: $this->pluginSlug
        ));
    }

    // ─── Logging (always available) ────────────────────────────────────────

    public function log(string $level, string $message, array $context = []): void
    {
        $levels = ['debug', 'info', 'warning', 'error'];

        if (!in_array($level, $levels)) {
            $level = 'info';
        }

        Log::$level("[Plugin:{$this->pluginSlug}] " . $message, $context);
    }

    // ─── Permission Check Helper ───────────────────────────────────────────

    private function requirePermission(string $permission): void
    {
        if (!in_array($permission, $this->permissions, true)) {
            throw new \RuntimeException(
                "Plugin [{$this->pluginSlug}] does not have permission: [{$permission}]. " .
                "Add it to your plugin.json declared_permissions array."
            );
        }
    }

    public function hasPermission(string $permission): bool
    {
        return in_array($permission, $this->permissions, true);
    }

    public function getPluginSlug(): string
    {
        return $this->pluginSlug;
    }
}
