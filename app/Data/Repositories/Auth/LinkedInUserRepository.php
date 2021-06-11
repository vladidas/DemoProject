<?php

namespace App\Data\Repositories\Auth;

use App\Data\Models\Auth\LinkedInUser;
use App\Data\Repositories\Repository;

/**
 * Class    LinkedInUserRepository
 * @package App\Data\Repositories\Auth
 * @author  Vlad Golubtsov
 */
class LinkedInUserRepository extends Repository
{
    /**
     * LinkedInUserRepository constructor.
     * @param LinkedInUser $model
     */
    public function __construct(LinkedInUser $model)
    {
        parent::__construct($model);
    }
}
