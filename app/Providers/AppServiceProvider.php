<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//Added by Tapiwa according to https://laravel-news.com/laravel-5-4-key-too-long-error
use Illuminate\Support\Facades\Schema;

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
        //Added by Tapiwa according to https://laravel-news.com/laravel-5-4-key-too-long-error
        Schema::defaultStringLength(191);
    }
}
