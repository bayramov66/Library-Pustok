<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
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
         Blade::directive('ca', function ($route) {
            return "{{request()->routeIs('admin.'.$route) ? 'active' : ''}}";
        });

         Blade::directive('route', function ($route) {
            return "{{ route('admin.'.$route)}}";
        });

         Blade::directive('images', function ($route) {
            return "{{ route('admin.'.$route)}}";
        });
        Blade::directive('productimg', function ($route) {
            return "{{ route('admin.'.$route)}}";
        });
        Blade::directive('brands', function ($route) {
            return "{{ route('admin.'.$route)}}";
        });
        Blade::directive('slides', function ($route) {
            return "{{ route('admin.'.$route)}}";
        });
        Blade::directive('shop', function ($route) {
            return "{{ route('admin.'.$route)}}";
        });
    }
}
