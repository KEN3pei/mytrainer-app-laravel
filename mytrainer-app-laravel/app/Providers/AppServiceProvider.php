<?php

namespace App\Providers;

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
        $this->app->singleton(
            \App\DataProvider\TrainingMenuItemRepositoryInterface::class,
            \App\DataProvider\TrainingMenuItemRepository::class
        );
        $this->app->singleton(
            \App\DataProvider\TrainingMenuListRepositoryInterface::class,
            \App\DataProvider\TrainingMenuListRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
