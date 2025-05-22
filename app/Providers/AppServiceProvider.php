<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Spbu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share navigation SPBUs with specific templates only
        // CHANGE: Rename variable to avoid conflicts and limit scope
        View::composer([
            'layouts.app', 
            'partials.navigation', 
            'partials.footer',
            'aboutus',
            'career',
            'contact',
            'landingpage', // Add the aboutus blade if it's not part of the layouts
        ], function ($view) {
            $navigationSpbus = Spbu::where('is_active', true)
                ->orderBy('established_year', 'asc')
                ->get();
                
            $view->with('navigationSpbus', $navigationSpbus);
        });
    }
}