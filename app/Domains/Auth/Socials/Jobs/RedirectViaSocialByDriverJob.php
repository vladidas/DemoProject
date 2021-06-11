<?php

namespace App\Domains\Auth\Socials\Jobs;

use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;
use Lucid\Units\Job;

/**
 * Class    RedirectViaSocialByDriverJob
 * @package App\Domains\Auth\Socials\Jobs
 * @author  Vlad Golubtsov
 */
class RedirectViaSocialByDriverJob extends Job
{
    /**
     * RedirectViaSocialByDriverJob constructor.
     * @param string $driver
     */
    public function __construct(
        private string $driver
    ) {
        //
    }

    /**
     * @return RedirectResponse
     */
    public function handle(): RedirectResponse
    {
        return Socialite::driver($this->driver)->redirect();
    }
}
