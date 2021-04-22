<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Util;

class UtilServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('util', function(){
            return new Util(); //ここでエラーを吐いている
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
