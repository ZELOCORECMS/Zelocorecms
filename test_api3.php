<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$manager = app(App\Services\Theme\ThemeManager::class);
$themes = $manager->getInstalledThemes();
echo json_encode(['data' => $themes]);
