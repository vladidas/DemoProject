<?php

namespace App\Domains\Auth\Socials\User\Jobs;

use App\Data\Models\Auth\User;
use App\Data\Repositories\Auth\UserRepository;
use Lucid\Units\Job;

/**
 * Class    StoreUserJob
 * @package App\Domains\Auth\Socials\User\Jobs
 * @author  Vlad Golubtsov
 */
class StoreUserJob extends Job
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
     * @param UserRepository $userRepository
     * @return User
     */
    public function handle(UserRepository $userRepository): User
    {
        return $userRepository->fillAndSave($this->data);
    }
}
