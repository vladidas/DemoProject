<?php

/*
|--------------------------------------------------------------------------
| Service - Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for this service.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use \App\Services\Client\Http\Controllers\Auth\LinkedInController;

Route::get('/', fn() => view('client::welcome'))->name('home');

/**
 * Authentication.
 */
Route::group(['prefix' => 'login'], function () {
    /**
     * LinkedIn Social.
     */
    Route::group(['prefix' => 'linkedin'], function () {
        Route::get('/redirect', [LinkedInController::class, 'redirect'])->name('login.via.linkedin');
        Route::get('/callback', [LinkedInController::class, 'callback'])->name('login.via.callback');
    });
});
