# 📁 ZELOCORECMS — PHP Project Structure & Architecture

> **Document 12 of 13 | ZELOCORECMS Startup Planning Suite**
> **UPDATED: PHP 8.2+ | Composer | GPL v2+ | Solo Founder**

---

## 1. Root Repository Structure

```
zelocorecms/                              # Root repository
├── .github/
│   ├── workflows/
│   │   ├── ci.yml                        # PHP tests + linting
│   │   ├── release.yml                   # GitHub release + Packagist update
│   │   ├── security.yml                  # Dependabot + security scanning
│   │   └── docs-deploy.yml               # Deploy docs
│   ├── ISSUE_TEMPLATE/
│   │   ├── bug_report.yml
│   │   ├── feature_request.yml
│   │   └── security.md                   # → security@zelocorecms.com
│   ├── PULL_REQUEST_TEMPLATE.md
│   ├── CODEOWNERS                        # = @your-github-handle (solo)
│   └── dependabot.yml                    # Auto-update Composer packages
│
├── src/                                  # PHP source code (PSR-4)
│   ├── Core/                             # Framework core
│   │   ├── Application.php               # App bootstrap & DI container
│   │   ├── Config/
│   │   │   ├── Config.php                # Configuration loader
│   │   │   └── ConfigSchema.php          # Validation rules
│   │   ├── Http/
│   │   │   ├── Kernel.php                # HTTP kernel (handles requests)
│   │   │   ├── Router.php                # FastRoute wrapper
│   │   │   ├── Request.php               # PSR-7 request
│   │   │   ├── Response.php              # PSR-7 response
│   │   │   └── Middleware/
│   │   │       ├── AuthMiddleware.php
│   │   │       ├── RateLimitMiddleware.php
│   │   │       ├── CorsMiddleware.php
│   │   │       ├── CsrfMiddleware.php
│   │   │       └── SecurityHeadersMiddleware.php
│   │   ├── Hooks/
│   │   │   ├── HookRegistry.php          # Action/filter system
│   │   │   └── BuiltInHooks.php          # All built-in hook definitions
│   │   ├── Plugin/
│   │   │   ├── PluginManager.php         # Plugin lifecycle
│   │   │   ├── PluginSandbox.php         # Three-tier sandbox
│   │   │   ├── PluginAPI.php             # API exposed to plugins
│   │   │   ├── PluginManifest.php        # Plugin.json parser
│   │   │   └── PluginIntegrity.php       # Hash verification
│   │   ├── Cache/
│   │   │   ├── CacheManager.php          # Cache adapter factory
│   │   │   ├── FileCache.php             # Default (shared hosting)
│   │   │   └── RedisCache.php            # Optional (VPS+)
│   │   ├── Queue/
│   │   │   ├── QueueManager.php          # Queue adapter factory
│   │   │   ├── DatabaseQueue.php         # Default (shared hosting)
│   │   │   └── RedisQueue.php            # Optional (VPS+)
│   │   ├── Event/
│   │   │   └── EventDispatcher.php       # Internal events
│   │   └── Container/
│   │       └── ServiceProvider.php       # DI service bindings
│   │
│   ├── Auth/                             # Authentication module
│   │   ├── AuthService.php
│   │   ├── JwtService.php
│   │   ├── PasswordService.php
│   │   ├── MfaService.php               # TOTP MFA
│   │   ├── SessionManager.php
│   │   └── Providers/
│   │       ├── LocalProvider.php
│   │       ├── GoogleProvider.php
│   │       └── SamlProvider.php
│   │
│   ├── Content/                          # Content management
│   │   ├── ContentTypeService.php        # Content type CRUD
│   │   ├── ContentItemService.php        # Content item CRUD
│   │   ├── ContentQueryBuilder.php       # Filtered/sorted queries
│   │   ├── ContentVersionService.php     # Version history
│   │   ├── ContentValidator.php          # Schema-based validation
│   │   ├── FieldTypes/                   # All field type handlers
│   │   │   ├── TextField.php
│   │   │   ├── RichTextField.php
│   │   │   ├── MediaField.php
│   │   │   ├── RelationField.php
│   │   │   ├── BlocksField.php           # Dynamic zone
│   │   │   └── ...                       # (15+ field types)
│   │   └── Models/
│   │       ├── ContentType.php           # Eloquent model
│   │       ├── ContentItem.php           # Eloquent model
│   │       └── ContentVersion.php        # Eloquent model
│   │
│   ├── Media/                            # Media library
│   │   ├── MediaService.php
│   │   ├── ImageProcessor.php            # GD + Imagick
│   │   ├── Storage/
│   │   │   ├── StorageManager.php
│   │   │   ├── LocalStorage.php          # Default
│   │   │   └── S3Storage.php             # Optional
│   │   └── Models/
│   │       └── Media.php
│   │
│   ├── Users/                            # User management
│   │   ├── UserService.php
│   │   ├── RoleService.php
│   │   ├── PermissionService.php
│   │   └── Models/
│   │       ├── User.php
│   │       ├── Role.php
│   │       └── WorkspaceMember.php
│   │
│   ├── Workspace/                        # Multi-tenant workspaces
│   │   ├── WorkspaceService.php
│   │   └── Models/
│   │       └── Workspace.php
│   │
│   ├── SEO/                              # Built-in SEO
│   │   ├── SeoService.php
│   │   ├── SitemapGenerator.php
│   │   └── StructuredDataBuilder.php
│   │
│   ├── Api/                              # REST API layer
│   │   ├── Controllers/
│   │   │   ├── ContentController.php
│   │   │   ├── AuthController.php
│   │   │   ├── MediaController.php
│   │   │   ├── UserController.php
│   │   │   ├── PluginController.php
│   │   │   └── WebhookController.php
│   │   ├── Middleware/
│   │   │   └── ApiAuthMiddleware.php
│   │   └── Resources/                    # API response transformers
│   │       ├── ContentResource.php
│   │       └── UserResource.php
│   │
│   ├── GraphQL/                          # GraphQL API layer
│   │   ├── GraphQLServer.php
│   │   ├── SchemaBuilder.php             # Auto-build from content types
│   │   └── Resolvers/
│   │       ├── ContentResolver.php
│   │       └── MediaResolver.php
│   │
│   ├── Migrate/                          # Migration tools
│   │   ├── WordPressMigrator.php
│   │   ├── StrapiMigrator.php
│   │   └── ContentfulMigrator.php
│   │
│   └── AI/                               # ZeloAI layer
│       ├── AiService.php
│       ├── Providers/
│       │   ├── OpenAIProvider.php
│       │   └── AnthropicProvider.php
│       └── Features/
│           ├── ContentGenerator.php
│           └── SeoAnalyzer.php
│
├── admin/                                # Admin UI (Vue.js SPA)
│   ├── src/
│   │   ├── main.js
│   │   ├── App.vue
│   │   ├── router/
│   │   ├── stores/                       # Pinia stores
│   │   ├── components/
│   │   │   ├── layout/
│   │   │   ├── content/
│   │   │   ├── media/
│   │   │   └── fields/                   # One Vue component per field type
│   │   └── views/
│   │       ├── dashboard/
│   │       ├── content/
│   │       ├── media/
│   │       ├── users/
│   │       └── settings/
│   ├── dist/                             # Compiled assets (committed to repo)
│   ├── package.json
│   └── vite.config.js
│
├── database/
│   ├── migrations/                       # PHP migration files (Phinx)
│   │   ├── 20260101000000_initial_schema.php
│   │   └── 20260115000000_add_workspaces.php
│   ├── seeds/                            # Database seed data
│   │   ├── DemoDataSeeder.php
│   │   └── SystemRolesSeeder.php
│   └── schema.sql                        # Full schema dump (reference)
│
├── config/
│   ├── app.php                           # App configuration
│   ├── database.php                      # Database configuration
│   ├── cache.php                         # Cache configuration
│   ├── auth.php                          # Auth configuration
│   ├── storage.php                       # Storage configuration
│   └── plugins.php                       # Plugin configuration
│
├── plugins/                              # Official bundled plugins
│   ├── zelocms-seo/
│   │   ├── plugin.json                   # Plugin manifest
│   │   ├── ZeloCMSSEOPlugin.php
│   │   └── composer.json
│   ├── zelocms-forms/
│   └── zelocms-sitemap/
│
├── templates/                            # Admin PHP templates (fallback)
│   └── installer/
│       └── install.php
│
├── public/                               # Web root (point Apache/Nginx here)
│   ├── index.php                         # Single entry point
│   ├── .htaccess                         # Apache config + security
│   ├── admin/                            # Compiled Vue.js admin files
│   │   ├── index.html
│   │   ├── assets/
│   │   └── manifest.json
│   └── uploads/                          # Media uploads (gitignored)
│
├── tests/                                # PHPUnit test suite
│   ├── Unit/                             # Unit tests (fast)
│   │   ├── Core/
│   │   ├── Content/
│   │   └── Auth/
│   ├── Integration/                      # Integration tests (with DB)
│   │   ├── Api/
│   │   └── Plugin/
│   └── Feature/                          # Feature/E2E tests
│       └── ContentWorkflowTest.php
│
├── bin/
│   └── zelocms                           # ZeloCLI entry point (PHP)
│
├── docker/
│   ├── Dockerfile                        # Production
│   ├── Dockerfile.dev                    # Development
│   ├── docker-compose.yml                # Full stack
│   └── docker-compose.dev.yml
│
├── docs/                                 # Documentation source
│   └── *.md
│
├── .env.example                          # Environment template
├── .gitignore
├── composer.json                         # PHP dependencies
├── composer.lock
├── phpunit.xml                           # PHPUnit config
├── phpstan.neon                          # PHPStan config (static analysis)
├── .php-cs-fixer.php                     # Code style config
├── phinx.php                             # Database migrations config
├── CONTRIBUTING.md
├── CODE_OF_CONDUCT.md
├── SECURITY.md
├── CHANGELOG.md
└── LICENSE                              # GPL v2 or Later
```

---

## 2. `composer.json` — Dependencies

```json
{
    "name": "zelocorecms/zelocorecms",
    "description": "A modern, secure, open-source CMS built with PHP",
    "type": "project",
    "license": "GPL-2.0-or-later",
    "authors": [
        {
            "name": "ZELOCORECMS Contributors",
            "homepage": "https://github.com/zelocorecms/zelocorecms/graphs/contributors"
        }
    ],
    "require": {
        "php": ">=8.2",
        "ext-pdo": "*",
        "ext-json": "*",
        "ext-mbstring": "*",
        "ext-openssl": "*",
        "ext-gd": "*",
        
        "slim/slim": "^4.13",
        "slim/psr7": "^1.6",
        "illuminate/database": "^11.0",
        "php-di/php-di": "^7.0",
        "nikic/fast-route": "^1.3",
        "twig/twig": "^3.0",
        "webonyx/graphql-php": "^15.0",
        "firebase/php-jwt": "^6.0",
        "symfony/mailer": "^7.0",
        "symfony/console": "^7.0",
        "ezimuel/php-secure-session": "^0.1",
        "ezyang/htmlpurifier": "^4.17",
        "robrichards/xmlseclibs": "^3.1",
        "league/flysystem": "^3.0",
        "league/flysystem-aws-s3-v3": "^3.0",
        "intervention/image": "^3.0",
        "ramsey/uuid": "^4.7",
        "vlucas/phpdotenv": "^5.6",
        "psr/log": "^3.0",
        "monolog/monolog": "^3.0"
    },
    "require-dev": {
        "phpunit/phpunit": "^11.0",
        "phpstan/phpstan": "^1.10",
        "friendsofphp/php-cs-fixer": "^3.0",
        "fakerphp/faker": "^1.23",
        "mockery/mockery": "^1.6"
    },
    "autoload": {
        "psr-4": {
            "ZeloCMS\\": "src/"
        }
    },
    "autoload-dev": {
        "psr-4": {
            "ZeloCMS\\Tests\\": "tests/"
        }
    },
    "scripts": {
        "test": "phpunit",
        "test:unit": "phpunit --testsuite=Unit",
        "test:integration": "phpunit --testsuite=Integration",
        "cs:fix": "php-cs-fixer fix",
        "cs:check": "php-cs-fixer fix --dry-run",
        "analyse": "phpstan analyse",
        "migrate": "php bin/zelocms db:migrate",
        "seed": "php bin/zelocms db:seed"
    },
    "config": {
        "sort-packages": true,
        "optimize-autoloader": true
    }
}
```

---

## 3. `public/index.php` — Single Entry Point

```php
<?php
/**
 * ZELOCORECMS Front Controller
 *
 * This is the single entry point for all web requests.
 * Point your web server document root to the /public/ directory.
 *
 * @package ZeloCMS
 * @license GPL-2.0-or-later
 */

declare(strict_types=1);

// Security: Prevent direct file access info leakage
if (!defined('ZELOCMS_ROOT')) {
    define('ZELOCMS_ROOT', dirname(__DIR__));
}

// Load Composer autoloader
require_once ZELOCMS_ROOT . '/vendor/autoload.php';

// Load environment variables (.env file)
$dotenv = Dotenv\Dotenv::createImmutable(ZELOCMS_ROOT);
$dotenv->safeLoad(); // safeLoad = no error if .env missing (production env vars)

// Bootstrap and run the application
$app = require_once ZELOCMS_ROOT . '/bootstrap/app.php';
$app->run();
```

---

## 4. `.htaccess` — Apache Configuration

```apache
# ZELOCORECMS Apache Configuration
# Compatible with all cPanel/Plesk/DirectAdmin shared hosting

Options -Indexes -MultiViews
DirectoryIndex index.php

# Route all requests to index.php (like ZelocoreCMS)
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /
    
    # Skip real files and directories
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    
    # Route everything to index.php
    RewriteRule ^(.*)$ index.php [QSA,L]
</IfModule>

# Security headers
<IfModule mod_headers.c>
    Header always set X-Frame-Options "DENY"
    Header always set X-Content-Type-Options "nosniff"
    Header always set X-XSS-Protection "1; mode=block"
    Header always set Referrer-Policy "strict-origin-when-cross-origin"
    Header always set Permissions-Policy "camera=(), microphone=(), geolocation=()"
    Header always unset X-Powered-By
    
    # HSTS (only enable after HTTPS confirmed working)
    # Header always set Strict-Transport-Security "max-age=31536000"
</IfModule>

# Protect sensitive files
<FilesMatch "^(composer\.(json|lock)|\.env.*|phpunit\.xml|phinx\.php|phpstan\.neon)$">
    Order allow,deny
    Deny from all
</FilesMatch>

# Protect config and source directories
<IfModule mod_rewrite.c>
    RewriteRule ^(config|src|database|tests|vendor)/ - [F,L]
</IfModule>

# Enable Gzip compression
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/html text/css application/javascript application/json
</IfModule>

# Browser caching for static assets
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType image/jpeg "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType image/webp "access plus 1 year"
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType application/javascript "access plus 1 month"
</IfModule>
```

---

## 5. CI/CD Pipeline (GitHub Actions)

```yaml
# .github/workflows/ci.yml
name: CI

on:
  push:
    branches: [main, develop]
  pull_request:
    branches: [main, develop]

jobs:
  lint:
    name: PHP Code Style & Static Analysis
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4
      
      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: '8.2'
          tools: composer:v2, php-cs-fixer, phpstan
          coverage: none
      
      - name: Install dependencies
        run: composer install --prefer-dist --no-progress
      
      - name: Check code style
        run: composer cs:check
      
      - name: Static analysis (PHPStan level 8)
        run: composer analyse

  test:
    name: PHP Tests
    runs-on: ubuntu-latest
    
    services:
      mysql:
        image: mysql:8.0
        env:
          MYSQL_ROOT_PASSWORD: testing
          MYSQL_DATABASE: zelocms_test
        options: >-
          --health-cmd="mysqladmin ping"
          --health-interval=10s
    
    strategy:
      matrix:
        php: ['8.2', '8.3', '8.4']  # Test all supported versions
    
    steps:
      - uses: actions/checkout@v4
      
      - name: Setup PHP ${{ matrix.php }}
        uses: shivammathur/setup-php@v2
        with:
          php-version: ${{ matrix.php }}
          extensions: pdo, pdo_mysql, gd, mbstring, json, openssl, zip
          coverage: xdebug
      
      - name: Install dependencies
        run: composer install --prefer-dist --no-progress
      
      - name: Run migrations
        run: php bin/zelocms db:migrate
        env:
          DB_URL: mysql://root:testing@127.0.0.1:3306/zelocms_test
      
      - name: Run unit tests
        run: composer test:unit
      
      - name: Run integration tests
        run: composer test:integration
        env:
          DB_URL: mysql://root:testing@127.0.0.1:3306/zelocms_test
      
      - name: Upload coverage
        if: matrix.php == '8.2'
        uses: codecov/codecov-action@v4

  security:
    name: Security Audit
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4
      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: '8.2'
          tools: composer:v2
      
      - name: Install dependencies
        run: composer install --prefer-dist --no-progress
      
      - name: Composer security audit
        run: composer audit
      
      - name: Check for known PHP vulnerabilities
        uses: symfonycorp/security-checker-action@v5
```

---

## 6. Versioning Strategy (PHP/Packagist)

### Semantic Versioning
- **MAJOR.MINOR.PATCH** (e.g., 1.0.0, 1.2.3, 2.0.0)
- Published to **Packagist** (the PHP package registry)
- Git tags trigger automatic Packagist updates

### Installation via Composer
```bash
# Install ZELOCORECMS
composer create-project zelocorecms/zelocorecms my-cms

# Or update an existing installation
composer update zelocorecms/zelocorecms
```

### PHP Version Support Policy
| PHP Version | Support |
|-------------|---------|
| 8.2 | ✅ Full support (LTS) |
| 8.3 | ✅ Full support |
| 8.4 | ✅ Full support (latest) |
| 8.1 | ❌ Not supported (EOL Dec 2025) |
| 8.0 | ❌ Not supported |
| 7.x | ❌ Not supported |
