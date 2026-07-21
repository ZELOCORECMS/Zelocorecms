<?php

/**
 * ZELOCORECMS — A Modern Open Source CMS
 *
 * Copyright (C) 2026 ZELOCORECMS Contributors
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 */

return [

    'name' => env('APP_NAME', 'ZELOCORECMS'),
    'env' => env('APP_ENV', 'production'),
    'debug' => (bool) env('APP_DEBUG', false),
    'url' => env('APP_URL', 'http://localhost'),
    'timezone' => env('APP_TIMEZONE', 'UTC'),
    'locale' => env('APP_LOCALE', 'en'),
    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),
    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),
    'cipher' => 'AES-256-CBC',
    'key' => env('APP_KEY'),
    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],
    'maintenance' => ['driver' => 'file'],

    // ─── ZELOCORECMS Specific Configuration ──────────────────────────────────

    'cms' => [
        // CMS version
        'version' => '1.0.0-alpha',
        'codename' => 'ZeloCore',

        // Admin panel path (change to obscure it)
        'admin_path' => env('ZELOCMS_ADMIN_PATH', 'admin'),

        // Allow user registration (disable for private installs)
        'allow_registration' => env('ZELOCMS_ALLOW_REGISTRATION', false),

        // Maximum workspaces per instance (0 = unlimited)
        'max_workspaces' => env('ZELOCMS_MAX_WORKSPACES', 0),

        // Plugin system configuration
        'plugins' => [
            'enabled' => env('ZELOCMS_PLUGINS_ENABLED', true),
            'auto_update' => env('ZELOCMS_PLUGINS_AUTO_UPDATE', false),
            'registry_url' => env('ZELOCMS_PLUGIN_REGISTRY', 'https://plugins.zelocorecms.com'),
        ],

        // AI configuration (ZeloAI)
        'ai' => [
            'enabled' => env('ZELOCMS_AI_ENABLED', false),
            'provider' => env('ZELOCMS_AI_PROVIDER', 'openai'), // openai, anthropic, ollama
            'model' => env('ZELOCMS_AI_MODEL', 'gpt-4o'),
        ],

        // Media processing
        'media' => [
            'max_upload_size' => env('ZELOCMS_MAX_UPLOAD_MB', 50) * 1024, // in KB
            'allowed_image_types' => ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'avif'],
            'allowed_video_types' => ['mp4', 'webm', 'mov', 'avi'],
            'allowed_document_types' => ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'txt', 'zip'],
            'image_quality' => env('ZELOCMS_IMAGE_QUALITY', 85),
            'generate_webp' => env('ZELOCMS_GENERATE_WEBP', true),
            'thumbnail_sizes' => [
                'thumbnail' => [150, 150],
                'medium' => [300, 300],
                'medium_large' => [768, 0],
                'large' => [1024, 1024],
            ],
        ],

        // API configuration
        'api' => [
            'version' => 'v1',
            'rate_limit' => env('ZELOCMS_API_RATE_LIMIT', 1000), // per minute
            'pagination_default' => 20,
            'pagination_max' => 100,
        ],

        // Content defaults
        'content' => [
            'revisions_limit' => env('ZELOCMS_REVISIONS_LIMIT', 100), // 0 = unlimited
            'auto_slug' => true,
        ],
    ],

    'providers' => [
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,
        // ZELOCORECMS providers
        App\Providers\ZeloCmsServiceProvider::class,
        App\Providers\HookServiceProvider::class,
        App\Providers\PluginServiceProvider::class,
    ],

    'aliases' => Illuminate\Support\Facades\Facade::defaultAliases()->merge([
        // ZELOCORECMS facades
        'Hook' => App\Facades\Hook::class,
        'Plugin' => App\Facades\Plugin::class,
        'ZeloCMS' => App\Facades\ZeloCMS::class,
    ])->toArray(),

];
