<?php

namespace App\Services\Dashboard\Providers;

use Lang;
use View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Translation\TranslationServiceProvider;

/**
 * Class    DashboardServiceProvider
 * @package App\Services\Dashboard\Providers
 * @author  Vlad Golubtsov
 */
class DashboardServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap migrations and factories for:
     * - `php artisan migrate` command.
     * - factory() helper.
     *
     * Previous usage:
     * php artisan migrate --path=src/Services/Dashboard/database/migrations
     * Now:
     * php artisan migrate
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom([
            realpath(__DIR__ . '/../database/migrations')
        ]);
    }

    /**
    * Register the Dashboard service provider.
    *
    * @return void
    */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(BroadcastServiceProvider::class);

        $this->registerResources();
    }

    /**
     * Register the Dashboard service resource namespaces.
     *
     * @return void
     */
    protected function registerResources()
    {
        // Translation must be registered ahead of adding lang namespaces
        $this->app->register(TranslationServiceProvider::class);

        Lang::addNamespace('dashboard', realpath(__DIR__.'/../resources/lang'));

        View::addNamespace('dashboard', base_path('resources/views/vendor/dashboard'));
        View::addNamespace('dashboard', realpath(__DIR__.'/../resources/views'));
    }
}
