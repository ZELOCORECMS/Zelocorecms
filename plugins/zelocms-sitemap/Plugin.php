<?php

declare(strict_types=1);
use App\Services\Plugin\PluginAPI;

/**
 * ZeloCMS Sitemap Plugin
 */

/** @var PluginAPI $zeloCMS */

// Listen to cron to generate sitemap every hour
$zeloCMS->addAction('system.cron', function ($now) use ($zeloCMS) {
    // Only run on the hour
    if ($now->minute === 0) {
        $zeloCMS->log('info', 'Sitemap generation triggered by cron.');

        if ($zeloCMS->hasPermission('content:read')) {
            // Mock generate sitemap logic
            $items = $zeloCMS->getContent('page', ['status' => 'published']);
            $zeloCMS->log('info', 'Found '.count($items).' pages for sitemap.');
        }
    }
});
