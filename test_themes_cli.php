<?php

use App\Services\Theme\ThemeManager;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$manager = app(ThemeManager::class);
$themes = $manager->getInstalledThemes();

echo 'Found '.count($themes)." themes:\n";
print_r($themes);
