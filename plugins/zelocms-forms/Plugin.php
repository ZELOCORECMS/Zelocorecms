<?php

declare(strict_types=1);
use App\Services\Plugin\PluginAPI;

/**
 * ZeloCMS Forms Plugin
 */

/** @var PluginAPI $zeloCMS */

// Register admin menu
$zeloCMS->addAction('plugin.activate', function () use ($zeloCMS) {
    if ($zeloCMS->hasPermission('admin:menu')) {
        $zeloCMS->registerAdminMenu([
            'label' => 'Forms',
            'icon' => 'pi pi-envelope',
            'route' => '/admin/forms',
        ]);
    }
});

// Hook into content creation to intercept form submissions (assuming content type 'form_submission')
$zeloCMS->addAction('content.afterCreate', function ($item) use ($zeloCMS) {
    if ($item->content_type_slug === 'form_submission') {
        $zeloCMS->log('info', 'New form submission received.', ['id' => $item->id]);

        // Notify admin
        if ($zeloCMS->hasPermission('email:send')) {
            $zeloCMS->sendEmail(
                'admin@example.com',
                'New Form Submission',
                "A new submission was received. ID: {$item->id}"
            );
        }
    }
});
