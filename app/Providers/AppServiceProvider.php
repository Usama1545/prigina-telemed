<?php

namespace App\Providers;

use App\Services\FirebaseAuthService;
use App\Services\FirestoreService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(FirestoreService::class);
        $this->app->singleton(FirebaseAuthService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
