<?php

use App\Services\Theme\ThemeManager;
use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$manager = app(ThemeManager::class);

echo 'Active theme: '.$manager->getActiveThemeSlug()."\n";
echo 'Theme exists: '.($manager->themeExists($manager->getActiveThemeSlug()) ? 'yes' : 'no')."\n";
$themeRoot = $manager->getThemePath($manager->getActiveThemeSlug());
echo 'Theme root: '.$themeRoot."\n";
echo 'Root exists: '.(File::exists($themeRoot) ? 'yes' : 'no')."\n";
echo 'Views exists: '.(File::exists($themeRoot.'/views') ? 'yes' : 'no')."\n";
echo 'Templates exists: '.(File::exists($themeRoot.'/templates') ? 'yes' : 'no')."\n";

$manager->bootTheme();
echo "Hints after boot:\n";
print_r(app('view.finder')->getHints());
