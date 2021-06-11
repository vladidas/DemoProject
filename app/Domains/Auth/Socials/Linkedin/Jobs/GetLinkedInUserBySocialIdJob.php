<?php

namespace App\Domains\Auth\Socials\LinkedIn\Jobs;

use App\Data\Models\Auth\User;
use App\Data\Repositories\Auth\UserRepository;
use Lucid\Units\Job;

/**
 * Class    GetLinkedInUserBySocialIdJob
 * @package App\Domains\Auth\Socials\LinkedIn\Jobs
 * @author  Vlad Golubtsov
 */
class GetLinkedInUserBySocialIdJob extends Job
{
    /**
     * GetLinkedInUserBySocialIdJob constructor.
     * @param string $socialId
     * @param array $relations
     */
    public function __construct(
        private string $socialId,
        private array $relations = [],
    ) {
        //
    }

    /**
     * @param UserRepository $userRepository
     * @return User|null
     */
    public function handle(UserRepository $userRepository): ?User
    {
        return $userRepository->findBySocialId(
            $this->socialId,
            $this->relations,
        );
    }
}
