<?php

namespace App\Services\Dashboard\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

/**
 * Class    BroadcastServiceProvider
 * @package App\Services\Dashboard\Providers
 * @author  Vlad Golubtsov
 */
class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();

        require __DIR__.'/../routes/channels.php';
    }
}
