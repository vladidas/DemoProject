<?php

namespace App\Domains\Auth\Socials\Jobs;

use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User;
use Lucid\Units\Job;

/**
 * Class    GetUserViaSocialByDriverJob
 * @package App\Domains\Auth\Socials\Jobs
 * @author  Vlad Golubtsov
 */
class GetUserViaSocialByDriverJob extends Job
{
    /**
     * GetUserViaSocialByDriverJob constructor.
     * @param string $driver
     */
    public function __construct(
        private string $driver
    ) {
        //
    }

    /**
     * @return User
     */
    public function handle(): User
    {
        return Socialite::driver($this->driver)->user();
    }
}
