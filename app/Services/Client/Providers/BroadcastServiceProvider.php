<?php

namespace App\Services\Client\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

/**
 * Class    BroadcastServiceProvider
 * @package App\Services\Client\Providers
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
