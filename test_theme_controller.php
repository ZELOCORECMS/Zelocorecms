<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

use App\Http\Controllers\Api\ThemeController;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;

$request = Request::create('/api/workspaces/default/themes', 'GET');
$request->workspace_id = null; // simulate what middleware might do

$controller = app(ThemeController::class);
$response = $controller->index($request, 'default');

echo $response->getContent();
