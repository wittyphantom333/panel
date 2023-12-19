<?php

namespace Pteranodon\Repositories\Eloquent;

use Pteranodon\Models\RecoveryToken;

class RecoveryTokenRepository extends EloquentRepository
{
    public function model(): string
    {
        return RecoveryToken::class;
    }
}
