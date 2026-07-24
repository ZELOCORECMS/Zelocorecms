<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Services\Theme\ThemeManager;
$manager = app(ThemeManager::class);

try {
    $manager->setActiveTheme('mock-theme', null);
    print_r(["Success", $manager->getActiveThemeSlug(null)]);
} catch (\Exception $e) {
    print_r(["Error", $e->getMessage()]);
}
