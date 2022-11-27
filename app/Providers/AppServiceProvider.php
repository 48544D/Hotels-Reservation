<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        Blade::if('admin', function () {
            if (auth()->user() && auth()->user()->role == '1') {
                return 1;
            }
            return 0;
        });
        Blade::if('client', function () {
            if (auth()->user() && auth()->user()->role == '0') {
                return 1;
            }
            return 0;
        });
    }
}
