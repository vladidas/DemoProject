<?php

namespace App\Domains\Auth\Socials\User\Jobs;

use Illuminate\Support\Arr;
use JetBrains\PhpStorm\ArrayShape;
use Lucid\Units\Job;

/**
 * Class    PrepareDataForUserTableJob
 * @package App\Domains\Auth\Socials\User\Jobs
 * @author  Vlad Golubtsov
 */
class PrepareDataForUserTableJob extends Job
{
    /**
     * StoreUserJob constructor.
     * @param array $data
     */
    public function __construct(
        private array $data
    ) {
        //
    }

    /**
     * @return array
     */
    public function handle(): array
    {
        return array_merge($this->data, $this->formatter($this->data));
    }

    /**
     * @param array $data
     * @return array
     */
    private function formatter(array $data): array
    {
        return [
            'social_access_token'     => Arr::get($data, 'token'),
            'social_refresh_token'    => Arr::get($data, 'refreshToken'),
            'social_expires_in_token' => Arr::get($data, 'expiresIn'),
            'social_id'               => Arr::get($data, 'id'),
            'email_verified_at'       => now(),
        ];
    }
}
