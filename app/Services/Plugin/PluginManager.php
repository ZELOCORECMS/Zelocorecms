<?php

declare(strict_types=1);

namespace App\Services\Plugin;

use App\Models\Plugin;
use App\Services\Hooks\HookRegistry;
use Illuminate\Support\Facades\Log;

class PluginManager
{
    public function __construct(
        private readonly HookRegistry $hooks,
        private readonly PluginSandbox $sandbox
    ) {}

    public function loadActivePlugins(): void
    {
        $plugins = Plugin::active()->get();

        foreach ($plugins as $plugin) {
            try {
                $api = new PluginAPI(
                    $plugin->slug,
                    $plugin->declared_permissions ?? [],
                    $this->hooks
                );

                $this->sandbox->loadPlugin($plugin, $api);
            } catch (\Exception $e) {
                Log::error("Failed to load plugin [{$plugin->slug}]: ".$e->getMessage());
            }
        }
    }
}
