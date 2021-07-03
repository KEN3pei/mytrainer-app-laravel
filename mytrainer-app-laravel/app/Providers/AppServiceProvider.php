<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;

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
        $this->app->singleton(
            \App\DataProvider\ItemBelongingListRepositoryInterface::class,
            \App\DataProvider\ItemBelongingListRepository::class
        );
        $this->app->singleton(
            \App\DataProvider\UserRepositoryInterface::class,
            \App\DataProvider\UserRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        // $url->forceScheme('https');
    }
}
