<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Tag;

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
        View::share('nav_categories', Category::all());
        View::share('nav_tags', Tag::all()); // Share nav tags with all views
    }
}
