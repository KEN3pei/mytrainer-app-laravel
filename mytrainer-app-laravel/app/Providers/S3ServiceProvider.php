<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\S3;

class S3ServiceProvider extends ServiceProvider
{
     /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton('s3', function(){
            return new S3(); //ここでエラーを吐いている
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