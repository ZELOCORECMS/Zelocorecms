<?php

declare(strict_types=1);

/**
 * ZeloCMS SEO Plugin
 * Modifies content types to add SEO fields.
 */

/** @var \App\Services\Plugin\PluginAPI $zeloCMS */

// Add SEO fields to all content types
$zeloCMS->addFilter('content.schema', function (array $schema, string $contentTypeSlug) {
    // Add an SEO tab/group
    $schema[] = [
        'name' => 'seo_title',
        'type' => 'text',
        'label' => 'SEO Title',
        'group' => 'SEO'
    ];
    $schema[] = [
        'name' => 'seo_description',
        'type' => 'text',
        'label' => 'Meta Description',
        'group' => 'SEO'
    ];
    return $schema;
});

// Add SEO meta tags to the API response
$zeloCMS->addFilter('api.response.content', function (array $response, string $contentTypeSlug) {
    if (isset($response['data']) && isset($response['data']['data'])) {
        $contentData = $response['data']['data'];
        
        $response['seo'] = [
            'title' => $contentData['seo_title'] ?? $contentData['title'] ?? '',
            'description' => $contentData['seo_description'] ?? '',
        ];
    }
    return $response;
});

// Register admin menu
$zeloCMS->addAction('plugin.activate', function() use ($zeloCMS) {
    if ($zeloCMS->hasPermission('admin:menu')) {
        $zeloCMS->registerAdminMenu([
            'label' => 'SEO Settings',
            'icon' => 'pi pi-search',
            'route' => '/admin/settings/seo'
        ]);
    }
});
