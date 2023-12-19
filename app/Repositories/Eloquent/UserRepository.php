<?php

namespace Pteranodon\Repositories\Eloquent;

use Pteranodon\Models\User;
use Pteranodon\Contracts\Repository\UserRepositoryInterface;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    /**
     * Return the model backing this repository.
     */
    public function model(): string
    {
        return User::class;
    }
}
