<?php
/**
 * ZELOCORECMS Configuration File
 */

return [
    'version' => '1.0.0-dev',
    'admin_path' => env('ZELOCMS_ADMIN_PATH', 'admin'),
    'allow_registration' => env('ZELOCMS_ALLOW_REGISTRATION', true),
    
    'content' => [
        'revisions_limit' => 100, // Keep 100 revisions per content item
    ],

    'plugins' => [
        'directory' => base_path('plugins'),
        'security_tier' => env('ZELOCMS_PLUGIN_TIER', 1), // 1 = Sandbox, 2 = PHP-FPM, 3 = Docker
    ],

    'media' => [
        'default_disk' => env('ZELOCMS_MEDIA_DISK', 'local'), // s3, public, local
        'max_upload_size' => 104857600, // 100MB
    ]
];
