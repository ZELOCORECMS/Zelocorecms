<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$request = Illuminate\Http\Request::create('/api/workspaces/default/themes', 'GET');
// We need to bypass auth for this test or actually use a token, but let's just do actingAs
$user = App\Models\User::first();
if ($user) {
    $request->setUserResolver(fn() => $user);
}
$response = $kernel->handle($request);
echo "STATUS: " . $response->getStatusCode() . "\n";
echo "CONTENT: " . $response->getContent() . "\n";
