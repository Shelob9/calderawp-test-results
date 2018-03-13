<?php

namespace App\Providers;

use App\Observers\WatchTestRun;
use App\RunTestFromUrl;
use App\TestRun;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //https://laravel-news.com/laravel-5-4-key-too-long-error
        Schema::defaultStringLength(191);
        TestRun::observe(new WatchTestRun(new Client() ));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind('GuzzleHttp\Client', function () {
            return new Client();
        });
        $this->app->bind('App\RunTestFromUrl', function () {
            return new RunTestFromUrl( new Client() );
        });
    }
}
