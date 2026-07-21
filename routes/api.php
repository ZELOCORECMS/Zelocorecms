<?php
/**
 * ZELOCORECMS — API Routes
 *
 * All API routes for ZELOCORECMS REST API v1.
 *
 * @license GPL-2.0-or-later
 */

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ContentController;
use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PluginController;
use App\Http\Controllers\Api\WorkspaceController;
use App\Http\Controllers\Api\WebhookController;
use App\Http\Controllers\Api\AuditController;
use App\Http\Middleware\WorkspaceMiddleware;
use Illuminate\Support\Facades\Route;

// ─── Public Routes (No Authentication Required) ──────────────────────────────

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])
        ->name('auth.register');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('auth.login');

    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])
        ->name('auth.forgot-password');
});

// ─── Authenticated Routes ────────────────────────────────────────────────────

Route::middleware('auth:sanctum')->group(function () {

    // Auth
    Route::prefix('auth')->group(function () {
        Route::get('/me', [AuthController::class, 'me'])->name('auth.me');
        Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
        Route::post('/refresh', [AuthController::class, 'refresh'])->name('auth.refresh');
    });

    // Field types (no workspace needed)
    Route::get('/field-types', [ContentController::class, 'fieldTypes'])
        ->name('field-types');

    // Workspaces
    Route::prefix('workspaces')->name('workspaces.')->group(function () {
        Route::get('/', [WorkspaceController::class, 'index'])->name('index');
        Route::post('/', [WorkspaceController::class, 'store'])->name('store');
        Route::get('/{slug}', [WorkspaceController::class, 'show'])->name('show');
        Route::patch('/{slug}', [WorkspaceController::class, 'update'])->name('update');
        Route::delete('/{slug}', [WorkspaceController::class, 'destroy'])->name('destroy');

        // Workspace Members
        Route::prefix('/{workspaceSlug}/members')->group(function () {
            Route::get('/', [WorkspaceController::class, 'members']);
            Route::post('/', [WorkspaceController::class, 'inviteMember']);
            Route::delete('/{userId}', [WorkspaceController::class, 'removeMember']);
        });
    });

    // ─── Workspace-Scoped Routes (require workspace context) ─────────────────

    Route::middleware([WorkspaceMiddleware::class])
        ->prefix('workspaces/{workspaceSlug}')
        ->group(function () {

            // Content Types
            Route::prefix('content-types')->name('content-types.')->group(function () {
                Route::get('/', [ContentController::class, 'indexTypes'])->name('index');
                Route::post('/', [ContentController::class, 'storeType'])->name('store');
                Route::get('/{slug}', [ContentController::class, 'showType'])->name('show');
                Route::patch('/{slug}', [ContentController::class, 'updateType'])->name('update');
                Route::delete('/{slug}', [ContentController::class, 'destroyType'])->name('destroy');
            });

            // Content Items
            Route::prefix('content/{type}')->name('content.')->group(function () {
                Route::get('/', [ContentController::class, 'index'])->name('index');
                Route::post('/', [ContentController::class, 'store'])->name('store');
                Route::get('/{id}', [ContentController::class, 'show'])->name('show');
                Route::patch('/{id}', [ContentController::class, 'update'])->name('update');
                Route::delete('/{id}', [ContentController::class, 'destroy'])->name('destroy');

                // Status Management
                Route::post('/{id}/publish', [ContentController::class, 'publish'])->name('publish');
                Route::post('/{id}/unpublish', [ContentController::class, 'unpublish'])->name('unpublish');
                Route::post('/{id}/trash', [ContentController::class, 'trash'])->name('trash');

                // Versions
                Route::get('/{id}/versions', [ContentController::class, 'versions'])->name('versions');
                Route::post('/{id}/restore/{version}', [ContentController::class, 'restoreVersion'])->name('restore');
            });

            // Media Library
            Route::prefix('media')->name('media.')->group(function () {
                Route::get('/', [MediaController::class, 'index'])->name('index');
                Route::post('/upload', [MediaController::class, 'upload'])->name('upload');
                Route::get('/{id}', [MediaController::class, 'show'])->name('show');
                Route::patch('/{id}', [MediaController::class, 'update'])->name('update');
                Route::delete('/{id}', [MediaController::class, 'destroy'])->name('destroy');
            });

            // Users (workspace-scoped)
            Route::prefix('users')->name('users.')->group(function () {
                Route::get('/', [UserController::class, 'index'])->name('index');
                Route::post('/', [UserController::class, 'store'])->name('store');
                Route::get('/{id}', [UserController::class, 'show'])->name('show');
                Route::patch('/{id}', [UserController::class, 'update'])->name('update');
                Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
            });

            // Roles
            Route::prefix('roles')->name('roles.')->group(function () {
                Route::get('/', [UserController::class, 'indexRoles'])->name('index');
                Route::post('/', [UserController::class, 'storeRole'])->name('store');
                Route::patch('/{id}', [UserController::class, 'updateRole'])->name('update');
                Route::delete('/{id}', [UserController::class, 'destroyRole'])->name('destroy');
            });

            // Plugins
            Route::prefix('plugins')->name('plugins.')->group(function () {
                Route::get('/', [PluginController::class, 'index'])->name('index');
                Route::post('/install', [PluginController::class, 'install'])->name('install');
                Route::post('/{slug}/activate', [PluginController::class, 'activate'])->name('activate');
                Route::post('/{slug}/deactivate', [PluginController::class, 'deactivate'])->name('deactivate');
                Route::delete('/{slug}', [PluginController::class, 'destroy'])->name('destroy');
                Route::get('/{slug}/settings', [PluginController::class, 'settings'])->name('settings');
                Route::patch('/{slug}/settings', [PluginController::class, 'updateSettings'])->name('settings.update');
            });

            // Webhooks
            Route::prefix('webhooks')->name('webhooks.')->group(function () {
                Route::get('/', [WebhookController::class, 'index'])->name('index');
                Route::post('/', [WebhookController::class, 'store'])->name('store');
                Route::patch('/{id}', [WebhookController::class, 'update'])->name('update');
                Route::delete('/{id}', [WebhookController::class, 'destroy'])->name('destroy');
                Route::post('/{id}/test', [WebhookController::class, 'test'])->name('test');
            });

            // Audit Log
            Route::get('/audit', [AuditController::class, 'index'])->name('audit.index');

        });

    // ─── Super Admin Routes ───────────────────────────────────────────────────
    Route::middleware('can:super-admin')
        ->prefix('admin')
        ->group(function () {
            Route::get('/system-info', fn() => response()->json([
                'cms_version' => config('app.cms.version'),
                'php_version' => PHP_VERSION,
                'laravel_version' => app()->version(),
                'plugin_sandbox_tier' => app(\App\Services\Plugin\PluginSandbox::class)->getTierDescription(),
            ]));
        });
});
