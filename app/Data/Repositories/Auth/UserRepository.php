<?php

namespace App\Data\Repositories\Auth;

use App\Data\Models\Auth\User;
use App\Data\Repositories\Repository;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class    UserRepository
 * @package App\Data\Repositories\Auth
 * @author  Vlad Golubtsov
 */
class UserRepository extends Repository
{
    /**
     * LinkedInUserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * @param string $socialId
     * @param array $relations
     * @return User|null
     */
    public function findBySocialId(string $socialId, array $relations = []): ?User
    {
        return $this
            ->getModel()
            ->with($relations)
            ->whereHas('linkedin', fn (Builder $query) => $query->whereSocialId($socialId))
            ->first();
    }
}
