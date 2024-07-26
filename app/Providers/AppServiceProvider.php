<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register any application services if needed
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Set pagination to use Bootstrap 5 styles
        Paginator::useBootstrapFive();
    }
}
