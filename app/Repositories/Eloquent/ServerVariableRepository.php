<?php

namespace Pteranodon\Repositories\Eloquent;

use Pteranodon\Models\ServerVariable;
use Pteranodon\Contracts\Repository\ServerVariableRepositoryInterface;

class ServerVariableRepository extends EloquentRepository implements ServerVariableRepositoryInterface
{
    /**
     * Return the model backing this repository.
     */
    public function model(): string
    {
        return ServerVariable::class;
    }
}
