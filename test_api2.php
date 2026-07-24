<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$request = Illuminate\Http\Request::create('/api/workspaces/default/themes', 'GET');
$request->headers->set('Accept', 'application/json');
$user = App\Models\User::first();
if ($user) {
    $app['auth']->guard('sanctum')->setUser($user);
}
$response = $kernel->handle($request);
echo "STATUS: " . $response->getStatusCode() . "\n";
echo "CONTENT: " . $response->getContent() . "\n";
