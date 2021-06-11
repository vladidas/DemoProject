<?php

namespace App\Providers;

use App\Services\Client\Providers\ClientServiceProvider;
use App\Services\Dashboard\Providers\DashboardServiceProvider;
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
        $this->app->register(ClientServiceProvider::class);
        $this->app->register(DashboardServiceProvider::class);
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
