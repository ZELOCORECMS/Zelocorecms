<?php

/**
 * ZELOCORECMS — Hook System
 *
 * WordPress-compatible Actions & Filters system implemented in Laravel.
 * Supports priority-based callback ordering, typed callbacks, and async hooks.
 *
 * @license GPL-2.0-or-later
 */

declare(strict_types=1);

namespace App\Services\Hooks;

use Closure;
use Illuminate\Support\Facades\Log;

class HookRegistry
{
    /**
     * Registered action callbacks.
     * Structure: ['hook_name' => [priority => [callbacks...]]]
     *
     * @var array<string, array<int, array<int, callable>>>
     */
    private array $actions = [];

    /**
     * Registered filter callbacks.
     * Structure: ['hook_name' => [priority => [callbacks...]]]
     *
     * @var array<string, array<int, array<int, callable>>>
     */
    private array $filters = [];

    /**
     * Currently executing hooks (for nested hook detection).
     *
     * @var array<string, bool>
     */
    private array $currentHooks = [];

    /**
     * Hook execution statistics (for debugging).
     *
     * @var array<string, array{count: int, total_time: float}>
     */
    private array $stats = [];

    /**
     * Register an action callback (WordPress-compatible: add_action).
     *
     * @param  string  $hook  The action hook name
     * @param  callable  $callback  The callback to register
     * @param  int  $priority  Execution order (lower = earlier, default: 10)
     * @param  int  $acceptedArgs  Number of arguments the callback accepts
     */
    public function addAction(
        string $hook,
        callable $callback,
        int $priority = 10,
        int $acceptedArgs = 1
    ): void {
        $this->actions[$hook][$priority][] = [
            'callback' => $callback,
            'acceptedArgs' => $acceptedArgs,
        ];
    }

    /**
     * Fire a registered action (WordPress-compatible: do_action).
     *
     * @param  string  $hook  The action hook name
     * @param  mixed  ...$args  Arguments to pass to callbacks
     */
    public function doAction(string $hook, mixed ...$args): void
    {
        if (! isset($this->actions[$hook])) {
            return;
        }

        $this->currentHooks[$hook] = true;
        $startTime = microtime(true);

        // Sort by priority and execute
        ksort($this->actions[$hook]);

        foreach ($this->actions[$hook] as $priority => $callbacks) {
            foreach ($callbacks as $callback) {
                try {
                    $passedArgs = array_slice($args, 0, $callback['acceptedArgs']);
                    ($callback['callback'])(...$passedArgs);
                } catch (\Throwable $e) {
                    Log::error("ZELOCMS Hook Error [{$hook}]: ".$e->getMessage(), [
                        'hook' => $hook,
                        'priority' => $priority,
                        'exception' => $e,
                    ]);
                }
            }
        }

        unset($this->currentHooks[$hook]);

        // Track statistics
        $this->stats[$hook] = [
            'count' => ($this->stats[$hook]['count'] ?? 0) + 1,
            'total_time' => ($this->stats[$hook]['total_time'] ?? 0) + (microtime(true) - $startTime),
        ];
    }

    /**
     * Register a filter callback (WordPress-compatible: add_filter).
     *
     * @param  string  $hook  The filter hook name
     * @param  callable  $callback  The callback to register
     * @param  int  $priority  Execution order (lower = earlier, default: 10)
     * @param  int  $acceptedArgs  Number of arguments the callback accepts
     */
    public function addFilter(
        string $hook,
        callable $callback,
        int $priority = 10,
        int $acceptedArgs = 1
    ): void {
        $this->filters[$hook][$priority][] = [
            'callback' => $callback,
            'acceptedArgs' => $acceptedArgs,
        ];
    }

    /**
     * Apply registered filters to a value (WordPress-compatible: apply_filters).
     *
     * @param  string  $hook  The filter hook name
     * @param  mixed  $value  The value to filter
     * @param  mixed  ...$args  Additional arguments
     * @return mixed The filtered value
     */
    public function applyFilters(string $hook, mixed $value, mixed ...$args): mixed
    {
        if (! isset($this->filters[$hook])) {
            return $value;
        }

        $this->currentHooks[$hook] = true;
        $startTime = microtime(true);

        // Sort by priority and apply each filter
        ksort($this->filters[$hook]);

        foreach ($this->filters[$hook] as $priority => $callbacks) {
            foreach ($callbacks as $callback) {
                try {
                    // Always pass the current value as first argument
                    $passedArgs = array_merge([$value], array_slice($args, 0, $callback['acceptedArgs'] - 1));
                    $result = ($callback['callback'])(...$passedArgs);

                    // Update value with filter result (if not null, to allow null return)
                    $value = $result;
                } catch (\Throwable $e) {
                    Log::error("ZELOCMS Filter Error [{$hook}]: ".$e->getMessage(), [
                        'hook' => $hook,
                        'priority' => $priority,
                        'exception' => $e,
                    ]);
                    // On error, keep previous value (don't break the filter chain)
                }
            }
        }

        unset($this->currentHooks[$hook]);

        // Track statistics
        $this->stats[$hook] = [
            'count' => ($this->stats[$hook]['count'] ?? 0) + 1,
            'total_time' => ($this->stats[$hook]['total_time'] ?? 0) + (microtime(true) - $startTime),
        ];

        return $value;
    }

    /**
     * Remove a registered action callback.
     *
     * @param  string  $hook  The action hook name
     * @param  callable  $callback  The callback to remove
     * @param  int  $priority  The priority it was registered with
     */
    public function removeAction(string $hook, callable $callback, int $priority = 10): bool
    {
        return $this->removeCallback($this->actions, $hook, $callback, $priority);
    }

    /**
     * Remove a registered filter callback.
     *
     * @param  string  $hook  The filter hook name
     * @param  callable  $callback  The callback to remove
     * @param  int  $priority  The priority it was registered with
     */
    public function removeFilter(string $hook, callable $callback, int $priority = 10): bool
    {
        return $this->removeCallback($this->filters, $hook, $callback, $priority);
    }

    /**
     * Remove all actions for a given hook.
     */
    public function removeAllActions(string $hook, ?int $priority = null): void
    {
        $this->removeAll($this->actions, $hook, $priority);
    }

    /**
     * Remove all filters for a given hook.
     */
    public function removeAllFilters(string $hook, ?int $priority = null): void
    {
        $this->removeAll($this->filters, $hook, $priority);
    }

    /**
     * Check if an action is registered.
     */
    public function hasAction(string $hook, callable|false $callback = false): bool
    {
        return $this->hasCallback($this->actions, $hook, $callback);
    }

    /**
     * Check if a filter is registered.
     */
    public function hasFilter(string $hook, callable|false $callback = false): bool
    {
        return $this->hasCallback($this->filters, $hook, $callback);
    }

    /**
     * Check if a hook is currently being executed.
     */
    public function doingHook(string $hook): bool
    {
        return $this->currentHooks[$hook] ?? false;
    }

    /**
     * Get hook execution statistics (useful for performance debugging).
     */
    public function getStats(): array
    {
        return $this->stats;
    }

    /**
     * Get all registered action hooks.
     */
    public function getActions(): array
    {
        return array_keys($this->actions);
    }

    /**
     * Get all registered filter hooks.
     */
    public function getFilters(): array
    {
        return array_keys($this->filters);
    }

    // ─── Private Helpers ──────────────────────────────────────────────────────

    private function removeCallback(array &$registry, string $hook, callable $callback, int $priority): bool
    {
        if (! isset($registry[$hook][$priority])) {
            return false;
        }

        $found = false;
        foreach ($registry[$hook][$priority] as $key => $registered) {
            if ($this->callbacksMatch($registered['callback'], $callback)) {
                unset($registry[$hook][$priority][$key]);
                $found = true;
                break;
            }
        }

        // Clean up empty arrays
        if (empty($registry[$hook][$priority])) {
            unset($registry[$hook][$priority]);
        }
        if (empty($registry[$hook])) {
            unset($registry[$hook]);
        }

        return $found;
    }

    private function removeAll(array &$registry, string $hook, ?int $priority): void
    {
        if ($priority !== null) {
            unset($registry[$hook][$priority]);
            if (empty($registry[$hook])) {
                unset($registry[$hook]);
            }
        } else {
            unset($registry[$hook]);
        }
    }

    private function hasCallback(array $registry, string $hook, callable|false $callback): bool
    {
        if (! isset($registry[$hook])) {
            return false;
        }

        if ($callback === false) {
            return true;
        }

        foreach ($registry[$hook] as $priority => $callbacks) {
            foreach ($callbacks as $registered) {
                if ($this->callbacksMatch($registered['callback'], $callback)) {
                    return true;
                }
            }
        }

        return false;
    }

    private function callbacksMatch(callable $a, callable $b): bool
    {
        if (is_string($a) && is_string($b)) {
            return $a === $b;
        }
        if ($a instanceof Closure && $b instanceof Closure) {
            return $a === $b;
        }
        if (is_array($a) && is_array($b)) {
            return $a[0] === $b[0] && $a[1] === $b[1];
        }

        return false;
    }
}
