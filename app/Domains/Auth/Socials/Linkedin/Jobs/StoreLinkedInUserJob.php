<?php

namespace App\Domains\Auth\Socials\LinkedIn\Jobs;

use App\Data\Models\Auth\LinkedInUser;
use App\Data\Repositories\Auth\LinkedInUserRepository;
use Illuminate\Support\Arr;
use Lucid\Units\Job;

/**
 * Class    StoreLinkedInUserJob
 * @package App\Domains\Auth\Socials\LinkedIn\Jobs
 * @author  Vlad Golubtsov
 */
class StoreLinkedInUserJob extends Job
{
    /**
     * StoreLinkedInUserJob constructor.
     * @param int $userId
     * @param array $data
     */
    public function __construct(
        private int $userId,
        private array $data
    ) {
        //
    }

    /**
     * @param LinkedInUserRepository $linkedInUserRepository
     * @return LinkedInUser
     */
    public function handle(LinkedInUserRepository $linkedInUserRepository): LinkedInUser
    {
        Arr::set($this->data, 'user_id', $this->userId);

        return $linkedInUserRepository->fillAndSave($this->data);
    }
}
