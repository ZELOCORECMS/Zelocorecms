<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Services\Theme\ThemeManager;
use Illuminate\Http\UploadedFile;

$file = new UploadedFile('/tmp/mock-theme.zip', 'mock-theme.zip', 'application/zip', null, true);
$manager = app(ThemeManager::class);
try {
    $result = $manager->installTheme($file);
    print_r(["Success", $result]);
} catch (\Exception $e) {
    print_r(["Error", $e->getMessage()]);
}
