<?php

namespace App\Providers;

use App\Models\Spbu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SpbuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share all active SPBUs with all views
        View::composer('*', function ($view) {
            $view->with('allSpbus', Spbu::where('is_active', true)
                ->select('id', 'name', 'code', 'slug')
                ->orderBy('name')
                ->get());
        });
    }
}