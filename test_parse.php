<?php

use App\Services\Theme\ThemeManager;
use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$manager = app(ThemeManager::class);
$reflection = new ReflectionClass($manager);
$method = $reflection->getMethod('parseStyleCss');
$method->setAccessible(true);
$meta = $method->invoke($manager, '/home/pronabjyoti/Desktop/Zelocorecms/Zelocorecms/themes/zelocore-theme/style.css');

print_r($meta);
