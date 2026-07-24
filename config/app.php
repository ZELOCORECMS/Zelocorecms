<?php

use App\Facades\Hook;
use App\Facades\Plugin;
use App\Facades\ZeloCMS;
use App\Providers\HookServiceProvider;
use App\Providers\PluginServiceProvider;
use App\Providers\ZeloCmsServiceProvider;
use Illuminate\Auth\AuthServiceProvider;
use Illuminate\Auth\Passwords\PasswordResetServiceProvider;
use Illuminate\Broadcasting\BroadcastServiceProvider;
use Illuminate\Bus\BusServiceProvider;
use Illuminate\Cache\CacheServiceProvider;
use Illuminate\Cookie\CookieServiceProvider;
use Illuminate\Database\DatabaseServiceProvider;
use Illuminate\Encryption\EncryptionServiceProvider;
use Illuminate\Filesystem\FilesystemServiceProvider;
use Illuminate\Foundation\Providers\ConsoleSupportServiceProvider;
use Illuminate\Foundation\Providers\FoundationServiceProvider;
use Illuminate\Hashing\HashServiceProvider;
use Illuminate\Mail\MailServiceProvider;
use Illuminate\Notifications\NotificationServiceProvider;
use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Pipeline\PipelineServiceProvider;
use Illuminate\Queue\QueueServiceProvider;
use Illuminate\Redis\RedisServiceProvider;
use Illuminate\Session\SessionServiceProvider;
use Illuminate\Support\Facades\Facade;
use Illuminate\Translation\TranslationServiceProvider;
use Illuminate\Validation\ValidationServiceProvider;
use Illuminate\View\ViewServiceProvider;

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
        AuthServiceProvider::class,
        BroadcastServiceProvider::class,
        BusServiceProvider::class,
        CacheServiceProvider::class,
        ConsoleSupportServiceProvider::class,
        CookieServiceProvider::class,
        DatabaseServiceProvider::class,
        EncryptionServiceProvider::class,
        FilesystemServiceProvider::class,
        FoundationServiceProvider::class,
        HashServiceProvider::class,
        MailServiceProvider::class,
        NotificationServiceProvider::class,
        PaginationServiceProvider::class,
        PipelineServiceProvider::class,
        QueueServiceProvider::class,
        RedisServiceProvider::class,
        PasswordResetServiceProvider::class,
        SessionServiceProvider::class,
        TranslationServiceProvider::class,
        ValidationServiceProvider::class,
        ViewServiceProvider::class,
        // ZELOCORECMS providers
        ZeloCmsServiceProvider::class,
        HookServiceProvider::class,
        PluginServiceProvider::class,
    ],

    'aliases' => Facade::defaultAliases()->merge([
        // ZELOCORECMS facades
        'Hook' => Hook::class,
        'Plugin' => Plugin::class,
        'ZeloCMS' => ZeloCMS::class,
    ])->toArray(),

];
