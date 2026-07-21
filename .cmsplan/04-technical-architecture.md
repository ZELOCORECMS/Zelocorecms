# 🏗️ ZELOCORECMS — Technical Architecture (PHP Edition)

> **Document 04 of 13 | ZELOCORECMS Startup Planning Suite**
> **UPDATED: PHP 8.2+ | Universal Hosting | GPL v2+**

---

## 1. Architecture Philosophy

ZELOCORECMS is built on **three foundational principles**:

1. **Universal Hostability** — Runs on shared hosting, VPS, cloud, Docker, or bare metal. Requires only PHP 8.2+ and MySQL/MariaDB. Zero Node.js required in production.
2. **Security at the Core** — Security constraints enforced at the architecture level, not the plugin level. Three-tier plugin isolation model covers every hosting type.
3. **Developer Experience = Product Quality** — Modern PHP 8.2+ (Fibers, Enums, Readonly classes, Named arguments) is not "legacy PHP" — it's a joy to use.

---

## 2. High-Level System Architecture

```
┌─────────────────────────────────────────────────────────────────────┐
│                        ZELOCORECMS SYSTEM (PHP)                     │
│                                                                     │
│  ┌─────────────────────────────────────────────────────────────┐   │
│  │                     CLIENT LAYER                            │   │
│  │  ┌──────────────┐  ┌──────────────┐  ┌────────────────┐   │   │
│  │  │ ZeloAdmin UI │  │ ZeloBuilder  │  │ Frontend / App │   │   │
│  │  │ (PHP/Vue.js) │  │ (Visual Ed.) │  │ (Any Tech)     │   │   │
│  │  └──────┬───────┘  └──────┬───────┘  └───────┬────────┘   │   │
│  └─────────│─────────────────│───────────────────│────────────┘   │
│            │                 │                   │                 │
│  ┌─────────▼─────────────────▼───────────────────▼────────────┐   │
│  │               ZELOCORECMS PHP KERNEL                        │   │
│  │                                                             │   │
│  │  ┌─────────────┐  ┌────────────┐  ┌───────────────────┐   │   │
│  │  │  Router     │  │ REST API   │  │ GraphQL API       │   │   │
│  │  │  Engine     │  │ Controller │  │ (Lighthouse/Custom)│  │   │
│  │  └─────────────┘  └────────────┘  └───────────────────┘   │   │
│  │                                                             │   │
│  │  ┌─────────────┐  ┌────────────┐  ┌───────────────────┐   │   │
│  │  │ Hook System │  │   Event    │  │   Service         │   │   │
│  │  │(Actions/    │  │  Dispatcher│  │   Container (DI)  │   │   │
│  │  │  Filters)   │  └────────────┘  └───────────────────┘   │   │
│  │  └─────────────┘                                           │   │
│  │                                                             │   │
│  │  ┌─────────────┐  ┌────────────┐  ┌───────────────────┐   │   │
│  │  │  Plugin     │  │   Media    │  │   Auth & RBAC     │   │   │
│  │  │  Sandbox    │  │   Manager  │  │   Engine          │   │   │
│  │  └─────────────┘  └────────────┘  └───────────────────┘   │   │
│  │                                                             │   │
│  │  ┌─────────────┐  ┌────────────┐  ┌───────────────────┐   │   │
│  │  │ SEO Engine  │  │ i18n Engine│  │  ZeloAI Layer     │   │   │
│  │  └─────────────┘  └────────────┘  └───────────────────┘   │   │
│  └─────────────────────────────────────────────────────────────┘   │
│                                                                     │
│  ┌─────────────────────────────────────────────────────────────┐   │
│  │                     DATA LAYER                              │   │
│  │  ┌────────────────┐  ┌──────────────┐  ┌───────────────┐  │   │
│  │  │ MySQL/MariaDB  │  │  File Cache  │  │ Object Storage│  │   │
│  │  │  (Primary DB)  │  │ Redis(opt.)  │  │ Local / S3    │  │   │
│  │  └────────────────┘  └──────────────┘  └───────────────┘  │   │
│  └─────────────────────────────────────────────────────────────┘   │
└─────────────────────────────────────────────────────────────────────┘
```

---

## 3. Technology Stack

### Backend Core
| Component | Technology | Justification |
|-----------|-----------|---------------|
| **Language** | PHP 8.2+ | Universal hosting, modern features, WordPress-familiar |
| **Framework Base** | Custom MVC (Slim framework core) | Lightweight, PSR-compliant, no framework lock-in |
| **ORM/Query Builder** | Laravel Eloquent (standalone) | Industry standard, powerful, developer-friendly |
| **Dependency Injection** | PHP-DI 7 | PSR-11 compliant, zero-config autowiring |
| **Router** | FastRoute | Fastest PHP router, used by Slim, Laminas |
| **API: REST** | Custom REST controllers (PSR-7) | Lightweight, framework-independent |
| **API: GraphQL** | Webonyx/graphql-php | Pure PHP GraphQL server |
| **Template Engine** | Twig 3 (admin) / None (headless) | Secure, fast, well-known |
| **Email** | Symfony Mailer (standalone) | PSR-compatible, provider-agnostic |
| **Image Processing** | GD Library / Imagick (PHP extensions) | Available on ALL hosting providers |
| **File Upload** | PHP built-in + custom validator | No external library needed |
| **CLI Tool** | Symfony Console (standalone) | Industry standard PHP CLI framework |
| **Testing** | PHPUnit 11 | Industry standard PHP testing |
| **Code Quality** | PHP-CS-Fixer + PHPStan | Consistent style + static analysis |

### Database
| Component | Technology | Justification |
|-----------|-----------|---------------|
| **Primary DB** | MySQL 8.0+ / MariaDB 10.6+ | Universal — every host provides MySQL |
| **Cache Layer** | File-based cache (default) / Redis (optional) | File cache works on ALL hosting; Redis enhances performance |
| **Object Storage** | Local filesystem (default) / S3 (optional) | No external dependency for basics |
| **Search** | MySQL FULLTEXT search (default) / Meilisearch (optional) | Works on shared hosting; upgrade path available |
| **Migrations** | Custom migration runner + Phinx | Works from CLI or web-based installer |
| **Session** | PHP native sessions / Database sessions | Flexible, hosting-compatible |

### Admin Frontend (ZeloAdmin)
| Component | Technology | Justification |
|-----------|-----------|---------------|
| **Framework** | Vue.js 3 (served as compiled assets) | Modern SPA, no server requirement, compiled to static files |
| **UI Components** | Custom + PrimeVue | Beautiful, accessible Vue components |
| **Styling** | CSS Variables + custom CSS | No build tool required on server |
| **State Management** | Pinia | Official Vue state management |
| **API Client** | Axios + custom typed wrappers | Universal HTTP client |
| **Rich Text** | TipTap (JS, compiled) | Best PHP-CMS compatible rich text editor |
| **Build Tool** | Vite (dev only) | Fast builds; compiled assets shipped in dist/ |
| **Tables/Lists** | TanStack Table (Vue adapter) | Powerful, headless table component |

> **Key:** Admin UI is compiled to static HTML/CSS/JS files. The PHP server just serves them. No Node.js required in production.

### Infrastructure (All Optional — Works Without Any)
| Component | Technology | Use Case |
|-----------|-----------|----------|
| **Containerization** | Docker + Docker Compose | Development + self-hosted VPS |
| **Process Manager** | Supervisor | Queue worker on VPS |
| **Reverse Proxy** | Nginx / Apache (.htaccess) | Shared hosting uses Apache |
| **Job Queue** | Database-backed queue (default) / Redis Queue | No Redis needed on shared hosting |
| **Scheduled Tasks** | Cron (via cpanel or server) | WordPress-style WP-Cron equivalent |

---

## 4. Hosting Compatibility Matrix

| Hosting Type | Compatibility | Notes |
|-------------|--------------|-------|
| **Shared Hosting (cPanel)** | ✅ Full | PHP 8.2+ + MySQL required (99% of hosts) |
| **cPanel/WHM Hosting** | ✅ Full | MultiPHP Manager to set PHP 8.2 |
| **Plesk Hosting** | ✅ Full | PHP version selector built-in |
| **DirectAdmin Hosting** | ✅ Full | Standard PHP + MySQL support |
| **VPS (Ubuntu/CentOS)** | ✅ Full | Nginx + PHP-FPM recommended |
| **Cloud (AWS/GCP/Azure)** | ✅ Full | Any PHP-capable compute |
| **Docker** | ✅ Full | Official Docker Compose provided |
| **Platform.sh** | ✅ Full | Official platform.sh config |
| **Laravel Forge** | ✅ Full | Works out of the box |
| **Cloudways** | ✅ Full | PHP 8.2 + MySQL available |
| **Kinsta** | ✅ Full | Managed WordPress host supports PHP CMS |

### Minimum Server Requirements
```
PHP:     8.2 or higher
MySQL:   8.0+ or MariaDB 10.6+
Memory:  64MB minimum (128MB recommended)
Storage: 50MB for CMS core
Extensions: PDO, PDO_MySQL, mbstring, json, openssl, 
            fileinfo, xml, zip, curl, gd or imagick
```

---

## 5. PHP Project Architecture (MVC + Service Layer)

```
Request → Apache/Nginx
    ↓
public/index.php  (single entry point, like WordPress)
    ↓
Bootstrap: Load config, bind services to DI container
    ↓
Router: Match URL to Controller
    ↓
Middleware: Auth check, Rate limit, CORS, Security headers
    ↓
Controller: Validates input, calls Service
    ↓
Service: Business logic, calls Repository
    ↓
Repository: Database queries via Eloquent ORM
    ↓
Response: JSON (API) or PHP Template (admin pages)
    ↓
Hook System: Events fired before/after each layer
```

---

## 6. Database Schema Design (MySQL)

```sql
-- Multi-tenant workspaces (for SaaS and agency use)
CREATE TABLE `zc_workspaces` (
  `id`          CHAR(36) PRIMARY KEY,
  `slug`        VARCHAR(100) UNIQUE NOT NULL,
  `name`        VARCHAR(255) NOT NULL,
  `settings`    JSON DEFAULT NULL,
  `plan`        ENUM('free','starter','pro','business','enterprise') DEFAULT 'free',
  `created_at`  DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at`  DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Content type definitions (replaces WP custom post types, but typed)
CREATE TABLE `zc_content_types` (
  `id`            CHAR(36) PRIMARY KEY,
  `workspace_id`  CHAR(36) NOT NULL,
  `slug`          VARCHAR(100) NOT NULL,
  `name`          VARCHAR(255) NOT NULL,
  `schema`        JSON NOT NULL COMMENT 'Field definitions JSON',
  `settings`      JSON DEFAULT NULL,
  `is_system`     TINYINT(1) DEFAULT 0,
  `created_at`    DATETIME DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `workspace_type` (`workspace_id`, `slug`),
  FOREIGN KEY (`workspace_id`) REFERENCES `zc_workspaces`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Content items (replaces wp_posts — proper design, not EAV)
CREATE TABLE `zc_content_items` (
  `id`              CHAR(36) PRIMARY KEY,
  `workspace_id`    CHAR(36) NOT NULL,
  `content_type_id` CHAR(36) NOT NULL,
  `slug`            VARCHAR(500) DEFAULT NULL,
  `status`          ENUM('draft','published','scheduled','archived','trash') DEFAULT 'draft',
  `data`            LONGTEXT NOT NULL COMMENT 'JSON field values',
  `meta`            JSON DEFAULT NULL COMMENT 'SEO, OG, custom meta',
  `version`         INT UNSIGNED DEFAULT 1,
  `published_at`    DATETIME DEFAULT NULL,
  `scheduled_at`    DATETIME DEFAULT NULL,
  `deleted_at`      DATETIME DEFAULT NULL,
  `created_by`      CHAR(36) DEFAULT NULL,
  `updated_by`      CHAR(36) DEFAULT NULL,
  `created_at`      DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at`      DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_workspace_type` (`workspace_id`, `content_type_id`),
  INDEX `idx_status` (`status`),
  INDEX `idx_slug` (`slug`(100)),
  INDEX `idx_published_at` (`published_at`),
  FULLTEXT INDEX `ft_search` (`slug`),
  FOREIGN KEY (`workspace_id`) REFERENCES `zc_workspaces`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`content_type_id`) REFERENCES `zc_content_types`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Content version history
CREATE TABLE `zc_content_versions` (
  `id`              CHAR(36) PRIMARY KEY,
  `content_item_id` CHAR(36) NOT NULL,
  `version`         INT UNSIGNED NOT NULL,
  `data`            LONGTEXT NOT NULL,
  `meta`            JSON DEFAULT NULL,
  `created_by`      CHAR(36) DEFAULT NULL,
  `created_at`      DATETIME DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_item_version` (`content_item_id`, `version`),
  FOREIGN KEY (`content_item_id`) REFERENCES `zc_content_items`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Users
CREATE TABLE `zc_users` (
  `id`            CHAR(36) PRIMARY KEY,
  `email`         VARCHAR(255) UNIQUE NOT NULL,
  `password_hash` VARCHAR(255) DEFAULT NULL,
  `first_name`    VARCHAR(100) DEFAULT NULL,
  `last_name`     VARCHAR(100) DEFAULT NULL,
  `avatar_url`    VARCHAR(500) DEFAULT NULL,
  `provider`      ENUM('local','google','github','saml','oidc') DEFAULT 'local',
  `provider_id`   VARCHAR(255) DEFAULT NULL,
  `is_super_admin` TINYINT(1) DEFAULT 0,
  `mfa_enabled`   TINYINT(1) DEFAULT 0,
  `mfa_secret`    VARCHAR(255) DEFAULT NULL COMMENT 'AES-256 encrypted',
  `last_login_at` DATETIME DEFAULT NULL,
  `created_at`    DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at`    DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Workspace members (RBAC)
CREATE TABLE `zc_workspace_members` (
  `id`            CHAR(36) PRIMARY KEY,
  `workspace_id`  CHAR(36) NOT NULL,
  `user_id`       CHAR(36) NOT NULL,
  `role_id`       CHAR(36) DEFAULT NULL,
  `invited_by`    CHAR(36) DEFAULT NULL,
  `joined_at`     DATETIME DEFAULT NULL,
  `created_at`    DATETIME DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `unique_member` (`workspace_id`, `user_id`),
  FOREIGN KEY (`workspace_id`) REFERENCES `zc_workspaces`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`user_id`) REFERENCES `zc_users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Roles
CREATE TABLE `zc_roles` (
  `id`            CHAR(36) PRIMARY KEY,
  `workspace_id`  CHAR(36) DEFAULT NULL,
  `name`          VARCHAR(100) NOT NULL,
  `permissions`   JSON NOT NULL DEFAULT ('{}'),
  `is_system`     TINYINT(1) DEFAULT 0,
  `created_at`    DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`workspace_id`) REFERENCES `zc_workspaces`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Media library
CREATE TABLE `zc_media` (
  `id`            CHAR(36) PRIMARY KEY,
  `workspace_id`  CHAR(36) NOT NULL,
  `filename`      VARCHAR(500) NOT NULL,
  `original_name` VARCHAR(500) DEFAULT NULL,
  `mime_type`     VARCHAR(100) DEFAULT NULL,
  `size`          BIGINT UNSIGNED DEFAULT NULL,
  `width`         INT UNSIGNED DEFAULT NULL,
  `height`        INT UNSIGNED DEFAULT NULL,
  `alt_text`      TEXT DEFAULT NULL,
  `caption`       TEXT DEFAULT NULL,
  `folder_id`     CHAR(36) DEFAULT NULL,
  `storage_path`  VARCHAR(1000) NOT NULL,
  `metadata`      JSON DEFAULT NULL,
  `created_by`    CHAR(36) DEFAULT NULL,
  `created_at`    DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`workspace_id`) REFERENCES `zc_workspaces`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Plugins registry
CREATE TABLE `zc_plugins` (
  `id`            CHAR(36) PRIMARY KEY,
  `workspace_id`  CHAR(36) DEFAULT NULL,
  `slug`          VARCHAR(200) UNIQUE NOT NULL,
  `name`          VARCHAR(255) NOT NULL,
  `version`       VARCHAR(50) DEFAULT NULL,
  `status`        ENUM('active','inactive','error') DEFAULT 'inactive',
  `signature_hash` VARCHAR(255) DEFAULT NULL COMMENT 'SHA-256 of plugin package',
  `declared_permissions` JSON DEFAULT NULL,
  `config`        LONGTEXT DEFAULT NULL COMMENT 'AES-256 encrypted JSON',
  `installed_at`  DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at`    DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`workspace_id`) REFERENCES `zc_workspaces`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Audit log (immutable)
CREATE TABLE `zc_audit_logs` (
  `id`            CHAR(36) PRIMARY KEY,
  `workspace_id`  CHAR(36) DEFAULT NULL,
  `user_id`       CHAR(36) DEFAULT NULL,
  `action`        VARCHAR(200) NOT NULL,
  `resource_type` VARCHAR(100) DEFAULT NULL,
  `resource_id`   CHAR(36) DEFAULT NULL,
  `old_value`     LONGTEXT DEFAULT NULL COMMENT 'JSON',
  `new_value`     LONGTEXT DEFAULT NULL COMMENT 'JSON',
  `ip_address`    VARCHAR(45) DEFAULT NULL,
  `user_agent`    TEXT DEFAULT NULL,
  `created_at`    DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Webhooks
CREATE TABLE `zc_webhooks` (
  `id`            CHAR(36) PRIMARY KEY,
  `workspace_id`  CHAR(36) NOT NULL,
  `name`          VARCHAR(255) DEFAULT NULL,
  `url`           VARCHAR(1000) NOT NULL,
  `events`        JSON NOT NULL DEFAULT ('[]'),
  `secret_hash`   VARCHAR(255) DEFAULT NULL COMMENT 'HMAC secret stored as hash',
  `is_active`     TINYINT(1) DEFAULT 1,
  `last_triggered_at` DATETIME DEFAULT NULL,
  `created_at`    DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`workspace_id`) REFERENCES `zc_workspaces`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Queue jobs (for shared hosting without Redis)
CREATE TABLE `zc_queue_jobs` (
  `id`            BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `queue`         VARCHAR(100) NOT NULL DEFAULT 'default',
  `payload`       LONGTEXT NOT NULL,
  `attempts`      TINYINT UNSIGNED DEFAULT 0,
  `reserved_at`   DATETIME DEFAULT NULL,
  `available_at`  DATETIME NOT NULL,
  `created_at`    DATETIME DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_queue_available` (`queue`, `available_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Options table (like wp_options for site-wide settings)
CREATE TABLE `zc_options` (
  `id`            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `workspace_id`  CHAR(36) DEFAULT NULL,
  `option_key`    VARCHAR(191) NOT NULL,
  `option_value`  LONGTEXT DEFAULT NULL,
  `autoload`      TINYINT(1) DEFAULT 1,
  UNIQUE KEY `unique_option` (`workspace_id`, `option_key`),
  FOREIGN KEY (`workspace_id`) REFERENCES `zc_workspaces`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

---

## 7. The PHP Hook System (WordPress-Inspired, Modernized)

```php
<?php
// src/Core/Hooks/HookRegistry.php

namespace ZeloCMS\Core\Hooks;

class HookRegistry
{
    private array $actions = [];
    private array $filters = [];
    
    /**
     * Register an action callback (like WordPress add_action)
     */
    public function addAction(string $hook, callable $callback, int $priority = 10): void
    {
        $this->actions[$hook][$priority][] = $callback;
        ksort($this->actions[$hook]);
    }
    
    /**
     * Fire an action (like WordPress do_action)
     */
    public function doAction(string $hook, mixed ...$args): void
    {
        foreach ($this->actions[$hook] ?? [] as $priority => $callbacks) {
            foreach ($callbacks as $callback) {
                $callback(...$args);
            }
        }
    }
    
    /**
     * Register a filter (like WordPress add_filter)
     */
    public function addFilter(string $hook, callable $callback, int $priority = 10): void
    {
        $this->filters[$hook][$priority][] = $callback;
        ksort($this->filters[$hook]);
    }
    
    /**
     * Apply filters (like WordPress apply_filters)
     */
    public function applyFilters(string $hook, mixed $value, mixed ...$args): mixed
    {
        foreach ($this->filters[$hook] ?? [] as $priority => $callbacks) {
            foreach ($callbacks as $callback) {
                $value = $callback($value, ...$args);
            }
        }
        return $value;
    }
    
    /**
     * Remove an action callback
     */
    public function removeAction(string $hook, callable $callback): void
    {
        foreach ($this->actions[$hook] ?? [] as $priority => &$callbacks) {
            $callbacks = array_filter($callbacks, fn($cb) => $cb !== $callback);
        }
    }
}

// Global instance (WordPress-compatible pattern)
// Usage: ZeloCMS::hooks()->doAction('content.afterPublish', $item);
```

### Plugin Registration (WordPress-Style)
```php
<?php
// Example plugin: zelocms-seo/index.php

use ZeloCMS\Core\Plugin\PluginInterface;
use ZeloCMS\Core\Hooks\HookRegistry;

class ZeloCMSSEOPlugin implements PluginInterface
{
    public function register(HookRegistry $hooks): void
    {
        $hooks->addFilter('content.beforeSave', [$this, 'injectSEODefaults'], 10);
        $hooks->addAction('content.afterPublish', [$this, 'generateSitemap'], 10);
        $hooks->addFilter('api.response.content', [$this, 'appendSEOData'], 10);
    }
    
    public function injectSEODefaults(array $content): array
    {
        if (empty($content['meta']['seo_title'])) {
            $content['meta']['seo_title'] = $content['data']['title'] ?? '';
        }
        return $content;
    }
    
    public function generateSitemap(array $contentItem): void
    {
        // Regenerate sitemap in background queue
        dispatch(new GenerateSitemapJob());
    }
}
```

---

## 8. REST API Design (Pure PHP, PSR-7)

```php
<?php
// src/Http/Controllers/Api/ContentController.php

namespace ZeloCMS\Http\Controllers\Api;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ContentController
{
    // GET /api/v1/content/{type}
    public function index(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $type = $args['type'];
        $query = $request->getQueryParams();
        
        // Validated query params: page, per_page, filter[status], sort, search
        $result = $this->contentService->findMany($type, $query);
        
        return $this->json($response, [
            'data' => $result->items,
            'meta' => [
                'total' => $result->total,
                'page' => $result->page,
                'per_page' => $result->perPage,
                'total_pages' => $result->totalPages,
            ]
        ]);
    }
    
    // POST /api/v1/content/{type}
    public function store(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $data = $request->getParsedBody();
        
        // Validate against content type schema
        $validated = $this->validator->validate($data, $args['type']);
        
        // Apply filters before save
        $validated = $this->hooks->applyFilters('content.beforeCreate', $validated);
        
        $item = $this->contentService->create($args['type'], $validated);
        
        // Fire action after create
        $this->hooks->doAction('content.afterCreate', $item);
        
        return $this->json($response, ['data' => $item], 201);
    }
}
```

---

## 9. Performance Strategy (PHP Optimized)

| Optimization | Method | Hosting Compatibility |
|-------------|--------|----------------------|
| **OPcache** | PHP OPcache (usually default on) | ALL hosting types |
| **Query Cache** | Eloquent eager loading, N+1 prevention | ALL hosting types |
| **Full-page Cache** | File-based cache (default) | ALL hosting types |
| **Object Cache** | Redis / Memcached (optional) | VPS+ only |
| **CDN** | Cloudflare free tier (DNS-level) | ALL hosting types |
| **Database Indexing** | Proper MySQL indices (designed in schema) | ALL hosting types |
| **API Response Cache** | ETag + Cache-Control headers | ALL hosting types |
| **Image Optimization** | GD/Imagick (PHP extension) | ALL hosting types |
| **Asset Compression** | Gzip (Apache/Nginx default) | ALL hosting types |

---

## 10. Deployment Methods

| Method | Command/Tool | Hosting Type |
|--------|-------------|-------------|
| **Web Installer** | Browse to `/install.php` | Shared hosting |
| **Composer** | `composer create-project zelocms/zelocms .` | Any SSH access |
| **ZeloCLI** | `php zelocms install` | Any SSH access |
| **Docker Compose** | `docker compose up -d` | VPS/Cloud |
| **One-click apps** | cPanel Softaculous (future) | Shared hosting |
| **Deploy button** | Render.com / Railway | Cloud platforms |
