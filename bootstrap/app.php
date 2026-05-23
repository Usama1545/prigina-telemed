<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Broadcast;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->prefix('admin')
                ->name('admin.')
                ->group(base_path('routes/admin.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'firebase.auth' => \App\Http\Middleware\FirebaseAuthMiddleware::class,
            'admin.auth' => \App\Http\Middleware\AdminAuthMiddleware::class,
        ]);
        $middleware->validateCsrfTokens(except: [
            'broadcasting/auth',
            '/admin/login',
            '/api/admin/authenticate',
        ]);

    })->withBroadcasting(
        __DIR__.'/../routes/channels.php',
        ['middleware' => ['web']] // ✅ override default (removes auth)
    )
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
