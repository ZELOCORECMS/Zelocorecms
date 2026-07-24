<?php

/**
 * ZELOCORECMS Admin Routes
 * Serves the admin SPA.
 */

use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    return view('admin');
})->where('any', '.*');
