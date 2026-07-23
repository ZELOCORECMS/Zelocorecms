# 🔒 ZELOCORECMS — Security Architecture Plan (PHP Edition)

> **Document 08 of 13 | ZELOCORECMS Startup Planning Suite**
> **UPDATED: Three-Tier Plugin Security | Universal Hosting | PHP 8.2+**

---

## 1. Security Philosophy

> **"Security is not a plugin. It is the product."**

WordPress's most fundamental security failure is architectural: every plugin runs inside the **same PHP process** with full access to the database, filesystem, and every other plugin's code. ZELOCORECMS redesigns this from scratch.

Our **Three-Tier Plugin Isolation** model adapts to the hosting environment automatically:
- **Tier 1 (Shared Hosting):** PHP function disabling + `open_basedir` + permission API
- **Tier 2 (VPS/Dedicated):** PHP-FPM separate pool per plugin + Tier 1 controls
- **Tier 3 (Docker/Container):** Full Docker container isolation + all lower-tier controls

This means ZELOCORECMS plugins are **always more secure than WordPress plugins**, regardless of hosting type.

---

## 2. The Three-Tier Plugin Security Model

### Why Docker-Only Isn't Enough

The most secure approach (Docker container isolation) is ideal — but shared hosting providers don't offer Docker. A security model that only works on VPS would lock out 60%+ of potential users.

Our answer: **Adaptive Security Tiers** — the CMS detects the environment and applies the strongest isolation available.

```
┌───────────────────────────────────────────────────────────┐
│              PLUGIN SECURITY TIER DETECTION               │
│                                                           │
│   Server Start                                            │
│       ↓                                                   │
│   Is Docker available? ──── YES ──→ TIER 3 (Maximum)     │
│       ↓ NO                                                │
│   Is PHP-FPM with separate pools available?               │
│       ↓ YES ──→ TIER 2 (High Security)                   │
│       ↓ NO                                                │
│   TIER 1 (Strong Security — Shared Hosting Compatible)    │
└───────────────────────────────────────────────────────────┘
```

---

### 🛡️ TIER 1: PHP-Level Sandbox (ALL hosting types)

**Applicable to:** Shared hosting, VPS, any environment

This is the **baseline** security layer applied to ALL plugins on ALL hosting types.

```php
<?php
// src/Core/Plugin/PluginSandbox.php

class PluginSandboxTier1
{
    /**
     * Functions that plugins are NEVER allowed to call.
     * Enforced at PHP level via disable_functions in a per-plugin
     * php.ini override (user.ini on shared hosting).
     */
    private const DISABLED_FUNCTIONS = [
        // System execution — most common attack vector
        'exec', 'shell_exec', 'system', 'passthru', 'popen',
        'proc_open', 'proc_close', 'proc_get_status',
        
        // Code execution
        'eval',         // Already dangerous but reinforce
        'assert',       // Can execute code
        'preg_replace', // /e modifier (PHP 5 - but still listed)
        
        // File operations (beyond plugin directory)
        'file_get_contents', // Blocked unless in plugin dir (use API)
        'file_put_contents', // Blocked unless in plugin dir (use API)
        'fopen', 'fread', 'fwrite', 'unlink', 'rename', 'copy',
        'mkdir', 'rmdir', 'glob', 'scandir',
        
        // Network (unless 'network:external' permission declared)
        'curl_exec', 'curl_multi_exec',
        'file', 'ftp_connect', 'fsockopen', 'socket_create',
        
        // PHP runtime manipulation
        'ini_set', 'ini_get', 'set_time_limit',
        'error_reporting', 'ob_start', 'ob_end_flush',
        'phpinfo', 'php_uname',
        
        // Process/environment
        'getenv', 'putenv', 'apache_getenv', 'apache_setenv',
        'posix_kill', 'posix_getpwuid', 'posix_setuid',
    ];
    
    /**
     * Allowed ONLY via the ZeloCMS Plugin API, not direct DB access.
     * Plugins CANNOT use $wpdb equivalent directly.
     */
    private const BLOCKED_CLASSES = [
        'PDO',           // No direct database access
        'PDOStatement',  // No direct database access
        'mysqli',        // No direct MySQL access
    ];
    
    /**
     * Load a plugin within restricted scope.
     * 
     * Each plugin gets its own isolated scope:
     * - open_basedir limited to: plugin directory + allowed paths
     * - Declared permissions validated before loading
     * - Plugin API injected (not global database access)
     */
    public function loadPlugin(Plugin $plugin): void
    {
        // 1. Verify plugin cryptographic hash before loading
        $this->verifyPluginIntegrity($plugin);
        
        // 2. Validate declared permissions
        $this->validatePermissions($plugin->getDeclaredPermissions());
        
        // 3. Set open_basedir restriction (secondary layer)
        $allowedPaths = implode(':', [
            $plugin->getDirectory(),
            sys_get_temp_dir(),
        ]);
        ini_set('open_basedir', $allowedPaths);
        
        // 4. Load plugin with restricted API only (no global access)
        $pluginAPI = $this->createRestrictedAPI($plugin);
        
        // 5. Include plugin in isolated scope (no global leakage)
        $loader = Closure::bind(
            function() use ($plugin, $pluginAPI) {
                // Plugin only has access to $zeloCMS (restricted API)
                $zeloCMS = $pluginAPI;
                require $plugin->getEntrypoint();
            },
            null,
            null  // No object context — plugin can't access $this
        );
        
        $loader();
        
        // 6. Restore open_basedir after loading
        ini_restore('open_basedir');
    }
    
    /**
     * Create a restricted API for the plugin.
     * Plugin ONLY gets this object — no direct DB, no globals.
     */
    private function createRestrictedAPI(Plugin $plugin): PluginAPI
    {
        return new PluginAPI(
            permissions: $plugin->getDeclaredPermissions(),
            pluginId: $plugin->getSlug(),
            contentRepository: new RestrictedContentRepository($plugin),
            settingsStore: new PluginSettingsStore($plugin->getSlug()),
            hooks: $this->hooks,
            httpClient: $plugin->hasPermission('network:external') 
                ? new RestrictedHttpClient($plugin->getAllowedDomains())
                : null,
        );
    }
}
```

**Tier 1 Protections Summary:**
| Protection | Method | What It Prevents |
|-----------|--------|-----------------|
| No direct DB access | Blocked PDO/mysqli classes | SQL injection, data theft |
| No system commands | Disabled functions list | RCE, server takeover |
| No filesystem escape | `open_basedir` per plugin | Reading /etc/passwd, config files |
| No globals access | Closure binding isolation | Accessing other plugins, sessions |
| No network by default | curl disabled unless declared | Data exfiltration, C2 callbacks |
| Integrity check | SHA-256 hash verification | Running tampered plugins |

---

### 🛡️🛡️ TIER 2: PHP-FPM Pool Isolation (VPS/Dedicated)

**Applicable to:** VPS, Dedicated, Cloud servers running PHP-FPM

When PHP-FPM is available, each plugin runs in its **own PHP-FPM pool** with a dedicated system user. This provides OS-level process isolation on top of Tier 1.

```ini
; /etc/php-fpm.d/zelocms-plugin-seo.conf
[zelocms-plugin-seo]

; Dedicated user — plugin SEO process can't touch other plugin files
user  = zelocms_plugin_seo
group = zelocms_plugin_seo

; Resource limits per plugin
pm.max_children  = 5
pm.max_requests  = 200

; Memory limit per plugin process
php_admin_value[memory_limit] = 32M

; Plugin-specific open_basedir
php_admin_value[open_basedir] = /var/www/zelocms/plugins/seo:/tmp

; All dangerous functions disabled
php_admin_value[disable_functions] = exec,shell_exec,system,passthru,popen,proc_open,eval,assert,file_get_contents,fopen,fwrite,unlink,mkdir,glob,curl_exec,getenv,putenv,phpinfo,posix_kill,posix_setuid

; No access to CMS environment variables
php_admin_flag[expose_php] = Off
```

**Tier 2 Additional Protections:**
| Protection | Method | What It Prevents |
|-----------|--------|-----------------|
| OS-level isolation | Separate Linux user per plugin | Privilege escalation between plugins |
| Memory limits | PHP-FPM pool limits | DoS via memory exhaustion |
| Process count limits | `pm.max_children` | DoS via process exhaustion |
| Filesystem isolation | Per-pool `open_basedir` | Accessing other plugins' files |

---

### 🛡️🛡️🛡️ TIER 3: Docker Container Isolation (Maximum Security)

**Applicable to:** Docker-capable environments (VPS with Docker, Kubernetes, cloud)

The most secure option. Each plugin runs in its own **ephemeral Docker container** with a hardened minimal image. Communication with the CMS is exclusively via message-passing API.

```yaml
# docker-compose.plugin.yml — auto-generated per active plugin
services:
  
  zelocms-core:
    image: zelocms/core:latest
    networks:
      - cms-internal

  # Each plugin gets its own container
  plugin-seo:
    image: zelocms/plugin-runtime:latest  # Hardened, minimal PHP image
    user: "33:33"                         # www-data, non-root
    read_only: true                       # Filesystem is READ ONLY
    tmpfs:
      - /tmp:size=32m,noexec,nosuid      # Temp dir with noexec!
    networks:
      - plugin-seo-net                    # Isolated network
    environment:
      - ZELOCMS_PLUGIN_ID=seo
      - ZELOCMS_API_TOKEN=${PLUGIN_SEO_TOKEN}  # Scoped JWT token
      - ZELOCMS_API_URL=http://zelocms-core:3000/plugin-api/v1
    volumes:
      - ./plugins/seo:/app:ro            # Plugin code: READ ONLY
    security_opt:
      - no-new-privileges:true           # Can't gain new privileges
      - seccomp:./seccomp-profile.json   # Restrict system calls
    cap_drop:
      - ALL                              # Drop ALL Linux capabilities
    cap_add:
      - NET_BIND_SERVICE                 # Only add what's needed
    deploy:
      resources:
        limits:
          cpus: '0.25'                   # 25% CPU max
          memory: 64M                    # 64MB RAM max
    restart: unless-stopped
    healthcheck:
      test: ["CMD", "curl", "-f", "http://localhost/health"]
      interval: 30s
      timeout: 5s
      retries: 3

networks:
  cms-internal:
    driver: bridge
  plugin-seo-net:
    driver: bridge
    internal: true                       # No internet access!
```

**Plugin Communication Protocol (Tier 3):**
```
Plugin Container                CMS Core Container
      │                               │
      │  POST /plugin-api/v1/content  │
      │  Authorization: Bearer {scoped JWT}
      │  Body: { type, query, ... }   │
      │ ─────────────────────────────▶│
      │                               │ Validate JWT permissions
      │                               │ Execute query safely
      │  { data, meta, error? }       │
      │ ◀─────────────────────────────│
      │                               │
   Plugin uses data — CAN NEVER       │
   access DB directly                 │
```

**Tier 3 Additional Protections:**
| Protection | Method | What It Prevents |
|-----------|--------|-----------------|
| Full process isolation | Separate container | Complete code isolation |
| Network isolation | Per-plugin Docker network | Plugin-to-plugin communication |
| Read-only filesystem | `read_only: true` | Persistent malware installation |
| No new privileges | `no-new-privileges` | Privilege escalation |
| Seccomp profile | Restricted syscalls | Kernel exploitation |
| Dropped capabilities | `cap_drop: ALL` | Linux capability abuse |
| Resource limits | CPU/Memory limits | DoS attacks |
| Scoped JWT tokens | Per-plugin API tokens | Cross-plugin data access |

---

## 3. Plugin Signing & Integrity

```
Developer creates plugin package
            ↓
Developer registers at plugins.zelocorecms.com
            ↓
Uploads plugin → automated security scan:
  • PHPStan static analysis
  • Semgrep security rules
  • Dependency vulnerability check (composer audit)
  • Manual review for P0 plugins
            ↓
ZELOCORECMS signs the package:
  SHA-256 hash of plugin ZIP → stored in registry
            ↓
User installs plugin via ZeloCLI or Admin UI
            ↓
ZELOCORECMS verifies:
  1. Download plugin from registry
  2. Compute SHA-256 of downloaded ZIP
  3. Compare against registry signature
  4. ABORT if mismatch — plugin is tampered
  5. Validate manifest permissions haven't changed
  6. Store hash in zc_plugins table
            ↓
On every plugin load:
  Verify local files hash matches stored hash
  (Detects file tampering after installation)
```

---

## 4. Authentication Security

### Password Security
```php
<?php
// Using PHP's built-in password_hash with PASSWORD_ARGON2ID
// (requires PHP 7.3+ — available on virtually all modern hosts)

class PasswordService
{
    private const ALGORITHM = PASSWORD_ARGON2ID;
    private const OPTIONS = [
        'memory_cost' => 65536,  // 64 MB
        'time_cost'   => 4,
        'threads'     => 1,      // 1 thread for shared hosting compatibility
    ];
    
    public function hash(string $password): string
    {
        return password_hash($password, self::ALGORITHM, self::OPTIONS);
    }
    
    public function verify(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
    
    public function needsRehash(string $hash): bool
    {
        return password_needs_rehash($hash, self::ALGORITHM, self::OPTIONS);
    }
}

// Password Policy Enforcement
class PasswordPolicy
{
    public function validate(string $password): array
    {
        $errors = [];
        
        if (strlen($password) < 12) {
            $errors[] = 'Password must be at least 12 characters.';
        }
        if (!preg_match('/[A-Z]/', $password)) {
            $errors[] = 'Password must contain at least one uppercase letter.';
        }
        if (!preg_match('/[a-z]/', $password)) {
            $errors[] = 'Password must contain at least one lowercase letter.';
        }
        if (!preg_match('/[0-9]/', $password)) {
            $errors[] = 'Password must contain at least one number.';
        }
        if (!preg_match('/[^A-Za-z0-9]/', $password)) {
            $errors[] = 'Password must contain at least one special character.';
        }
        
        return $errors;
    }
}
```

### Session Security (PHP)
```php
<?php
// Secure session configuration — set before session_start()
ini_set('session.cookie_httponly', 1);      // No JS access
ini_set('session.cookie_secure', 1);       // HTTPS only
ini_set('session.cookie_samesite', 'Strict'); // CSRF protection
ini_set('session.use_strict_mode', 1);      // Reject uninitialized session IDs
ini_set('session.gc_maxlifetime', 1800);   // 30 min idle timeout
ini_set('session.name', 'ZELOCMS_SESSION'); // Not "PHPSESSID"

// Regenerate session ID on privilege change (prevents session fixation)
session_regenerate_id(true);
```

### JWT for API Authentication
```php
<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtService
{
    // RS256 asymmetric signing (public/private key pair)
    // Better than HS256 — private key never exposed to clients
    
    public function generate(User $user, Workspace $workspace): array
    {
        $now = time();
        
        $accessPayload = [
            'iss' => 'zelocorecms',
            'sub' => $user->id,
            'wid' => $workspace->id,
            'roles' => $user->getRoleIds($workspace->id),
            'iat' => $now,
            'exp' => $now + 900,        // 15 minute access token
            'jti' => bin2hex(random_bytes(16)), // Unique ID for revocation
        ];
        
        $refreshPayload = [
            'iss' => 'zelocorecms',
            'sub' => $user->id,
            'type' => 'refresh',
            'iat' => $now,
            'exp' => $now + (86400 * 30), // 30 day refresh token
            'jti' => bin2hex(random_bytes(16)),
        ];
        
        return [
            'access_token'  => JWT::encode($accessPayload, $this->privateKey, 'RS256'),
            'refresh_token' => JWT::encode($refreshPayload, $this->privateKey, 'RS256'),
            'expires_in'    => 900,
        ];
    }
}
```

---

## 5. SQL Injection Prevention

```php
<?php
// ALWAYS use parameterized queries — NEVER string concatenation
// Eloquent ORM handles this automatically:

// ✅ SAFE — Eloquent parameterized
$posts = ContentItem::where('workspace_id', $workspaceId)
    ->where('status', 'published')
    ->where('content_type_id', $typeId)
    ->get();

// ✅ SAFE — Raw query with bindings
DB::select('SELECT * FROM zc_content_items WHERE workspace_id = ? AND slug = ?', [
    $workspaceId,
    $slug
]);

// ❌ NEVER DO THIS — SQL injection vulnerability
// DB::select("SELECT * FROM zc_content_items WHERE slug = '$slug'");
```

---

## 6. XSS Prevention

```php
<?php
// All output is escaped by default in Twig templates
// {{ user.name }}  →  auto-escaped (Twig default)
// {{ user.html|raw }}  →  raw (only for trusted HTML)

// In PHP:
echo htmlspecialchars($userInput, ENT_QUOTES | ENT_HTML5, 'UTF-8');

// Rich text content sanitized with HTMLPurifier (OWASP recommended)
$purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());
$safeHtml = $purifier->purify($userContent);
```

---

## 7. Security Headers (Apache .htaccess)

```apache
# .htaccess security headers — works on ALL shared hosting
<IfModule mod_headers.c>
    # Prevent clickjacking
    Header always set X-Frame-Options "DENY"
    
    # Prevent MIME sniffing
    Header always set X-Content-Type-Options "nosniff"
    
    # XSS protection (legacy browsers)
    Header always set X-XSS-Protection "1; mode=block"
    
    # HTTPS enforcement
    Header always set Strict-Transport-Security "max-age=31536000; includeSubDomains"
    
    # Referrer policy
    Header always set Referrer-Policy "strict-origin-when-cross-origin"
    
    # Content Security Policy
    Header always set Content-Security-Policy "default-src 'self'; script-src 'self' 'nonce-%{UNIQUE_ID}e'; style-src 'self' 'unsafe-inline'; img-src 'self' data: blob: https:; font-src 'self'; connect-src 'self'; frame-ancestors 'none';"
    
    # Remove PHP version exposure
    Header always unset X-Powered-By
</IfModule>

# Protect sensitive files
<Files "composer.json">
    Order allow,deny
    Deny from all
</Files>
<Files ".env">
    Order allow,deny
    Deny from all
</Files>
<Files "*.sql">
    Order allow,deny
    Deny from all
</Files>

# Prevent directory browsing
Options -Indexes

# Disable server signature
ServerSignature Off
```

---

## 8. CSRF Protection

```php
<?php
// Token-based CSRF protection for all state-changing operations

class CsrfMiddleware
{
    public function process(Request $request, Handler $handler): Response
    {
        // Skip for GET, HEAD, OPTIONS (safe methods)
        if (in_array($request->getMethod(), ['GET', 'HEAD', 'OPTIONS'])) {
            return $handler->handle($request);
        }
        
        // API requests use Bearer token auth (no CSRF needed)
        if ($request->hasHeader('Authorization')) {
            return $handler->handle($request);
        }
        
        // Web form requests require CSRF token
        $sessionToken = $_SESSION['csrf_token'] ?? null;
        $requestToken = $request->getParsedBody()['_csrf_token'] 
            ?? $request->getHeaderLine('X-CSRF-Token');
        
        if (!$sessionToken || !hash_equals($sessionToken, $requestToken)) {
            throw new CsrfException('CSRF token mismatch');
        }
        
        return $handler->handle($request);
    }
    
    public static function generateToken(): string
    {
        $token = bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $token;
        return $token;
    }
}
```

---

## 9. Brute Force & Rate Limiting

```php
<?php
// File-based rate limiting (works on ALL hosting — no Redis needed)
// Falls back gracefully to database rate limiting on shared hosting

class RateLimiter
{
    public function attempt(string $key, int $maxAttempts, int $decaySeconds): bool
    {
        $attempts = $this->cache->get("ratelimit:{$key}:count") ?? 0;
        
        if ($attempts >= $maxAttempts) {
            return false; // Rate limited
        }
        
        $this->cache->increment("ratelimit:{$key}:count", 1, $decaySeconds);
        return true; // Allowed
    }
    
    public function forLogin(string $email, string $ip): bool
    {
        // 5 attempts per email per 15 minutes
        $byEmail = $this->attempt("login:email:{$email}", 5, 900);
        // 20 attempts per IP per 15 minutes
        $byIP = $this->attempt("login:ip:{$ip}", 20, 900);
        
        return $byEmail && $byIP;
    }
}
```

---

## 10. Security Comparison: WP vs ZELOCORECMS

| Attack Vector | WordPress | ZELOCORECMS Tier 1 | Tier 2 | Tier 3 |
|--------------|-----------|-------------------|--------|--------|
| Malicious plugin executes shell command | 🔴 VULNERABLE | 🟢 Blocked | 🟢 Blocked | 🟢 Blocked |
| Plugin reads other plugin's code | 🔴 VULNERABLE | 🟡 Partially | 🟢 Blocked | 🟢 Blocked |
| Plugin connects to malicious server | 🔴 VULNERABLE | 🟢 Blocked* | 🟢 Blocked | 🟢 Blocked |
| Plugin accesses full database | 🔴 VULNERABLE | 🟢 Blocked | 🟢 Blocked | 🟢 Blocked |
| Plugin reads .env / config files | 🔴 VULNERABLE | 🟢 Blocked | 🟢 Blocked | 🟢 Blocked |
| Plugin privilege escalation | 🔴 VULNERABLE | 🟢 Blocked | 🟢 Blocked | 🟢 Blocked |
| Compromised plugin affects all sites | 🔴 VULNERABLE | 🟡 Contained | 🟢 Isolated | 🟢 Isolated |
| DoS via memory/CPU abuse | 🔴 VULNERABLE | 🟡 Partial | 🟢 Limited | 🟢 Hard limited |

*Unless `network:external` permission declared and admin approved
