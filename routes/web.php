<?php

use Illuminate\Support\Facades\Route;

use App\Services\Theme\ThemeManager;
use Illuminate\Support\Facades\File;

Route::get('/', function () {
    return view('theme::index');
});

Route::get('/about', function () {
    return view('theme::about');
});

Route::get('/docs', function () {
    return view('theme::docs');
});

Route::get('/contact', function () {
    return view('theme::contact');
});

Route::post('/contact', function (\Illuminate\Http\Request $request) {
    // Basic mock of form processing
    return back()->with('success', 'Thanks for contacting us! We will get back to you shortly.');
});

Route::get('/theme-assets/{path}', function ($path) {
    $themeManager = app(ThemeManager::class);
    $activeTheme = $themeManager->getActiveThemeSlug();
    $fullPath = $themeManager->getThemePath($activeTheme) . '/public/' . $path;

    if (!File::exists($fullPath)) {
        abort(404);
    }

    $mimeType = File::mimeType($fullPath);
    // Overrides for css/js since File::mimeType can fail for them sometimes
    if (str_ends_with($path, '.css')) {
        $mimeType = 'text/css';
    } elseif (str_ends_with($path, '.js')) {
        $mimeType = 'application/javascript';
    }

    return response()->file($fullPath, ['Content-Type' => $mimeType]);
})->where('path', '.*');

Route::get('/admin/{any?}', function () {
    return view('admin');
})->where('any', '.*');
