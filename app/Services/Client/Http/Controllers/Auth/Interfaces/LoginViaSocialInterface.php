<?php

namespace App\Services\Client\Http\Controllers\Auth\Interfaces;

/**
 * Interface LoginViaSocialInterface
 * @package  App\Services\Client\Http\Controllers\Auth\Interfaces
 * @author   Vlad Golubtsov
 */
interface LoginViaSocialInterface
{
    public function redirect();

    public function callback();
}
