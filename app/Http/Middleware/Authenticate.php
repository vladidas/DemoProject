<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Declare route if auth is successfully.
     */
    const REDIRECT_ROUTE_IF_AUTH = 'dashboard.home';

    /**
     * Declare route for login page.
     */
    const REDIRECT_ROUTE_LOGIN_PAGE = 'home';

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route(self::REDIRECT_ROUTE_LOGIN_PAGE);
        }
    }
}
