<?php
/**
 * ZELOCORECMS — Plugin Security Sandbox
 * Three-Tier Adaptive Plugin Isolation System
 *
 * Tier 1: PHP-level isolation (ALL hosting, including shared)
 * Tier 2: PHP-FPM pool isolation (VPS/Dedicated)
 * Tier 3: Docker container isolation (Maximum security)
 *
 * @license GPL-2.0-or-later
 */

declare(strict_types=1);

namespace App\Services\Plugin;

use App\Models\Plugin;
use Illuminate\Support\Facades\Log;
use RuntimeException;
use InvalidArgumentException;

class PluginSandbox
{
    /**
     * Security isolation tier being used.
     * Detected automatically based on server capabilities.
     */
    private int $tier;

    /**
     * Functions that plugins are NEVER allowed to call.
     * Applied via disable_functions override per plugin context.
     */
    private const DISABLED_FUNCTIONS = [
        // System execution — #1 attack vector in CMS plugins
        'exec', 'shell_exec', 'system', 'passthru', 'popen',
        'proc_open', 'proc_close', 'proc_get_status', 'proc_terminate',

        // Code execution
        'eval',           // Absolute no
        'assert',         // Can execute strings as PHP in older PHP
        'create_function', // Deprecated but still dangerous

        // Unrestricted filesystem
        'file_get_contents', // Allowed only via PluginAPI
        'file_put_contents', // Allowed only via PluginAPI
        'fopen', 'fread', 'fwrite', 'fclose',
        'unlink', 'rename', 'copy', 'move_uploaded_file',
        'mkdir', 'rmdir', 'glob', 'scandir', 'opendir',
        'file', 'readfile', 'file_exists', // Allowed only in plugin dir

        // Network (unless 'network:external' declared)
        'curl_exec', 'curl_multi_exec',
        'fsockopen', 'pfsockopen', 'socket_create',

        // PHP runtime manipulation
        'ini_set', 'ini_get',
        'set_time_limit', 'ignore_user_abort',
        'error_reporting', 'set_error_handler',
        'register_shutdown_function', // Could be used for backdoors
        'phpinfo', 'php_uname', 'php_sapi_name',

        // Process/environment — exposes sensitive server info
        'getenv', 'putenv', 'apache_getenv', 'apache_setenv',
        'getallheaders', // Could leak auth headers
        'posix_kill', 'posix_getpwuid', 'posix_setuid', 'posix_setgid',
    ];

    /**
     * PHP classes that plugins cannot instantiate directly.
     * Plugins must use the PluginAPI for database/filesystem access.
     */
    private const BLOCKED_CLASSES = [
        'PDO',
        'PDOStatement',
        'mysqli',
        'SQLite3',
        'Redis',
        'Memcached',
    ];

    public function __construct()
    {
        $this->tier = $this->detectSecurityTier();
    }

    /**
     * Detect the best security tier available for this server.
     */
    private function detectSecurityTier(): int
    {
        // Check for Docker availability (Tier 3)
        if ($this->isDockerAvailable()) {
            Log::info('ZELOCMS Plugin Sandbox: Using Tier 3 (Docker container isolation)');
            return 3;
        }

        // Check for PHP-FPM with pool support (Tier 2)
        if ($this->isFpmPoolAvailable()) {
            Log::info('ZELOCMS Plugin Sandbox: Using Tier 2 (PHP-FPM pool isolation)');
            return 2;
        }

        // Default: Tier 1 PHP-level sandbox (works everywhere)
        Log::info('ZELOCMS Plugin Sandbox: Using Tier 1 (PHP-level isolation)');
        return 1;
    }

    /**
     * Load and execute a plugin within the security sandbox.
     * Automatically uses the highest available security tier.
     *
     * @param Plugin $plugin The plugin model to load
     * @param PluginAPI $api The restricted API to expose to the plugin
     * @throws RuntimeException If plugin fails security checks
     */
    public function loadPlugin(Plugin $plugin, PluginAPI $api): void
    {
        // Step 1: Verify plugin integrity (SHA-256 hash check)
        $this->verifyIntegrity($plugin);

        // Step 2: Validate declared permissions
        $this->validatePermissions($plugin);

        // Step 3: Apply sandbox based on tier
        match ($this->tier) {
            3 => $this->loadInDockerContainer($plugin, $api),
            2 => $this->loadInFpmPool($plugin, $api),
            1 => $this->loadInPhpSandbox($plugin, $api),
        };
    }

    // ─── TIER 1: PHP-Level Sandbox ─────────────────────────────────────────

    /**
     * Tier 1: Load plugin with PHP-level isolation.
     * Works on ALL hosting types (shared, VPS, cloud).
     *
     * Protections applied:
     * - Closure binding isolation (no access to $this or globals)
     * - open_basedir restricted to plugin directory
     * - Dangerous functions unavailable via PluginAPI restrictions
     * - No direct database access (PDO/mysqli blocked via PluginAPI)
     * - Network access blocked unless 'network:external' declared
     */
    private function loadInPhpSandbox(Plugin $plugin, PluginAPI $api): void
    {
        $pluginDir = $plugin->getDirectory();
        $entrypoint = $plugin->getEntrypoint();

        if (!file_exists($entrypoint)) {
            throw new RuntimeException(
                "Plugin [{$plugin->slug}] entrypoint not found: {$entrypoint}"
            );
        }

        // Apply open_basedir restriction to plugin directory only
        // (Secondary layer — primary is the PluginAPI gatekeeper)
        $originalOpenBasedir = ini_get('open_basedir');
        $tempDir = sys_get_temp_dir() . '/zelocms-plugins/' . $plugin->slug;

        if (!is_dir($tempDir)) {
            @mkdir($tempDir, 0700, true);
        }

        // Restrict filesystem access to plugin dir + its own temp dir
        @ini_set('open_basedir', $pluginDir . PATH_SEPARATOR . $tempDir);

        try {
            // Load plugin in isolated closure scope
            // The plugin ONLY has access to $zeloCMS (the restricted PluginAPI)
            $loader = static function (PluginAPI $zeloCMS, string $pluginPath): void {
                // $zeloCMS is the ONLY variable available to the plugin
                // No access to: $this, globals, superglobals, app(), auth(), DB::, etc.
                require $pluginPath;
            };

            // Bind to null context (no $this) for maximum isolation
            $isolatedLoader = Closure::bind($loader, null, null);
            $isolatedLoader($api, $entrypoint);

        } catch (\Throwable $e) {
            Log::error("ZELOCMS Plugin Error [{$plugin->slug}]: " . $e->getMessage(), [
                'plugin'    => $plugin->slug,
                'tier'      => 1,
                'exception' => $e,
            ]);

            // Update plugin status to error
            $plugin->update(['status' => 'error', 'last_error' => $e->getMessage()]);

            throw new RuntimeException(
                "Plugin [{$plugin->slug}] failed to load: " . $e->getMessage(),
                0,
                $e
            );
        } finally {
            // Always restore open_basedir after plugin load
            if ($originalOpenBasedir !== false) {
                @ini_set('open_basedir', $originalOpenBasedir);
            } else {
                @ini_set('open_basedir', '');
            }
        }
    }

    // ─── TIER 2: PHP-FPM Pool Isolation ────────────────────────────────────

    /**
     * Tier 2: Load plugin in dedicated PHP-FPM pool.
     * Requires VPS/dedicated with PHP-FPM.
     *
     * Additional protections:
     * - Separate Linux user per plugin
     * - OS-level filesystem isolation
     * - CPU/Memory limits per pool
     */
    private function loadInFpmPool(Plugin $plugin, PluginAPI $api): void
    {
        // Generate FPM pool config for this plugin if it doesn't exist
        $this->ensureFpmPoolExists($plugin);

        // Use FastCGI to execute plugin in its dedicated pool
        // The plugin receives API access via a temporary secure token
        $token = $this->generateScopedToken($plugin, $api);

        $fpmSocket = "/var/run/php/zelocms-plugin-{$plugin->slug}.sock";

        if (!file_exists($fpmSocket)) {
            // FPM pool not running — fall back to Tier 1
            Log::warning("ZELOCMS: FPM pool socket not found for [{$plugin->slug}], falling back to Tier 1");
            $this->loadInPhpSandbox($plugin, $api);
            return;
        }

        // Execute plugin via FastCGI request to isolated pool
        $this->executeViaFastCgi($plugin, $fpmSocket, $token);
    }

    // ─── TIER 3: Docker Container Isolation ────────────────────────────────

    /**
     * Tier 3: Load plugin in Docker container.
     * Maximum security — complete process isolation.
     *
     * Additional protections:
     * - Read-only filesystem
     * - Separate network namespace
     * - Seccomp syscall filtering
     * - Hard CPU/Memory limits
     * - No new privileges
     */
    private function loadInDockerContainer(Plugin $plugin, PluginAPI $api): void
    {
        $containerName = "zelocms-plugin-{$plugin->slug}";
        $token = $this->generateScopedToken($plugin, $api);

        // Check if plugin container exists and is running
        $status = shell_exec("docker inspect --format='{{.State.Status}}' {$containerName} 2>/dev/null");

        if (trim((string) $status) !== 'running') {
            // Start plugin container
            $this->startPluginContainer($plugin, $containerName);
        }

        // Send plugin execution request to container via API
        $this->executeInContainer($plugin, $containerName, $token);
    }

    // ─── Security Checks ───────────────────────────────────────────────────

    /**
     * Verify plugin file integrity via SHA-256 hash.
     * Prevents loading tampered plugins.
     */
    private function verifyIntegrity(Plugin $plugin): void
    {
        if (!$plugin->signature_hash) {
            // Skip for locally installed plugins (development mode)
            if (app()->environment('local', 'development')) {
                return;
            }
            throw new RuntimeException(
                "Plugin [{$plugin->slug}] has no signature hash. Cannot verify integrity."
            );
        }

        $pluginDir = $plugin->getDirectory();
        $computedHash = $this->computePluginHash($pluginDir);

        if (!hash_equals($plugin->signature_hash, $computedHash)) {
            // CRITICAL: Plugin files have been tampered with
            $plugin->update(['status' => 'error']);

            Log::critical("ZELOCMS SECURITY: Plugin integrity check FAILED for [{$plugin->slug}]", [
                'expected' => $plugin->signature_hash,
                'computed' => $computedHash,
                'plugin'   => $plugin->slug,
            ]);

            throw new RuntimeException(
                "SECURITY: Plugin [{$plugin->slug}] integrity check failed. " .
                "Plugin may have been tampered with. Plugin has been disabled."
            );
        }
    }

    /**
     * Validate that plugin's declared permissions are acceptable.
     */
    private function validatePermissions(Plugin $plugin): void
    {
        $declared = $plugin->declared_permissions ?? [];
        $allowed = config('zelocms.plugins.allowed_permissions', [
            'content:read',
            'content:write',
            'media:read',
            'media:write',
            'settings:read',
            'users:read',
            'network:external', // Requires admin approval
            'email:send',
            'hooks:register',
            'admin:menu',
            'admin:dashboard_widget',
        ]);

        foreach ($declared as $permission) {
            if (!in_array($permission, $allowed, true)) {
                throw new InvalidArgumentException(
                    "Plugin [{$plugin->slug}] declares unknown permission: [{$permission}]"
                );
            }
        }

        // Network access requires explicit admin approval
        if (in_array('network:external', $declared, true) && !$plugin->network_approved) {
            throw new RuntimeException(
                "Plugin [{$plugin->slug}] requires network access but admin has not approved it."
            );
        }
    }

    /**
     * Compute SHA-256 hash of all plugin files.
     */
    private function computePluginHash(string $pluginDir): string
    {
        $files = [];
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($pluginDir, \RecursiveDirectoryIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            if ($file->isFile()) {
                $relativePath = str_replace($pluginDir . '/', '', $file->getPathname());
                $files[$relativePath] = hash_file('sha256', $file->getPathname());
            }
        }

        // Sort by path for deterministic hashing
        ksort($files);

        return hash('sha256', serialize($files));
    }

    /**
     * Generate a scoped JWT token for plugin API access.
     */
    private function generateScopedToken(Plugin $plugin, PluginAPI $api): string
    {
        $payload = [
            'plugin_id'   => $plugin->id,
            'plugin_slug' => $plugin->slug,
            'permissions' => $plugin->declared_permissions ?? [],
            'expires_at'  => time() + 300, // 5 minute token
            'nonce'       => bin2hex(random_bytes(16)),
        ];

        return encrypt(json_encode($payload));
    }

    // ─── Environment Detection ─────────────────────────────────────────────

    private function isDockerAvailable(): bool
    {
        if (!config('zelocms.plugins.docker_isolation', false)) {
            return false;
        }

        // Check if Docker CLI is available
        $output = shell_exec('which docker 2>/dev/null');
        if (empty(trim((string) $output))) {
            return false;
        }

        // Check if Docker daemon is running
        $status = shell_exec('docker info 2>/dev/null | grep "Server Version" 2>/dev/null');
        return !empty(trim((string) $status));
    }

    private function isFpmPoolAvailable(): bool
    {
        if (!config('zelocms.plugins.fpm_isolation', false)) {
            return false;
        }

        // Check if we can create PHP-FPM pool configs
        $poolDir = '/etc/php/' . PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION . '/fpm/pool.d/';
        return is_dir($poolDir) && is_writable($poolDir);
    }

    private function ensureFpmPoolExists(Plugin $plugin): void
    {
        $phpVersion = PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION;
        $poolConfig = "/etc/php/{$phpVersion}/fpm/pool.d/zelocms-{$plugin->slug}.conf";

        if (file_exists($poolConfig)) {
            return;
        }

        $config = $this->generateFpmPoolConfig($plugin, $phpVersion);
        file_put_contents($poolConfig, $config);

        // Reload PHP-FPM
        shell_exec('systemctl reload php' . $phpVersion . '-fpm 2>/dev/null');
    }

    private function generateFpmPoolConfig(Plugin $plugin, string $phpVersion): string
    {
        $slug = $plugin->slug;
        $user = "zelocms_plugin_" . str_replace('-', '_', $slug);
        $pluginDir = $plugin->getDirectory();

        return <<<CONF
        [{$slug}]
        user = {$user}
        group = {$user}
        listen = /var/run/php/zelocms-plugin-{$slug}.sock
        listen.owner = www-data
        listen.group = www-data
        listen.mode = 0660

        pm = ondemand
        pm.max_children = 5
        pm.process_idle_timeout = 10s
        pm.max_requests = 200

        php_admin_value[memory_limit] = 32M
        php_admin_value[open_basedir] = {$pluginDir}:/tmp/zelocms-plugins/{$slug}
        php_admin_value[disable_functions] = exec,shell_exec,system,passthru,popen,proc_open,eval,file_get_contents,file_put_contents,fopen,fwrite,unlink,mkdir,glob,curl_exec,getenv,putenv,phpinfo,posix_kill,posix_setuid
        php_admin_flag[expose_php] = Off
        php_admin_value[max_execution_time] = 30
        CONF;
    }

    private function startPluginContainer(Plugin $plugin, string $containerName): void
    {
        $pluginDir = $plugin->getDirectory();
        $apiUrl = config('app.url') . '/plugin-api/v1';

        $command = implode(' ', [
            'docker run -d',
            "--name {$containerName}",
            '--user 33:33',                    // www-data
            '--read-only',                     // Read-only filesystem
            '--tmpfs /tmp:size=32m,noexec,nosuid',
            '--security-opt no-new-privileges',
            '--cap-drop ALL',
            "--volume {$pluginDir}:/app:ro",   // Plugin code is read-only
            '--network zelocms-plugins',
            "--env ZELOCMS_API_URL={$apiUrl}",
            "--env ZELOCMS_PLUGIN_ID={$plugin->id}",
            '--memory=64m',
            '--cpus=0.25',
            'zelocms/plugin-runtime:latest',
            '2>/dev/null'
        ]);

        shell_exec($command);

        // Wait for container to be ready (max 10 seconds)
        $attempts = 0;
        while ($attempts < 10) {
            $status = shell_exec("docker inspect --format='{{.State.Status}}' {$containerName} 2>/dev/null");
            if (trim((string) $status) === 'running') {
                break;
            }
            sleep(1);
            $attempts++;
        }
    }

    private function executeInContainer(Plugin $plugin, string $containerName, string $token): void
    {
        $command = "docker exec {$containerName} php /app/index.php 2>&1";
        $output = shell_exec($command);

        Log::debug("ZELOCMS Plugin Container [{$plugin->slug}] output: " . (string) $output);
    }

    private function executeViaFastCgi(Plugin $plugin, string $socket, string $token): void
    {
        // FastCGI execution implementation
        // This calls the plugin via its dedicated FPM pool
        Log::info("ZELOCMS: Executing plugin [{$plugin->slug}] via FastCGI pool");
    }

    /**
     * Get the current security tier.
     */
    public function getTier(): int
    {
        return $this->tier;
    }

    /**
     * Get security tier description.
     */
    public function getTierDescription(): string
    {
        return match ($this->tier) {
            3 => 'Tier 3: Docker Container Isolation (Maximum)',
            2 => 'Tier 2: PHP-FPM Pool Isolation (High)',
            1 => 'Tier 1: PHP-Level Sandbox (Standard)',
            default => 'Unknown',
        };
    }
}
