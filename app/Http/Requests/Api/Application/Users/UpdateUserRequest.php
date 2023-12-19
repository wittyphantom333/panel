<?php

namespace Pteranodon\Http\Requests\Api\Application\Users;

use Pteranodon\Models\User;

class UpdateUserRequest extends StoreUserRequest
{
    public function rules(array $rules = null): array
    {
        return parent::rules($rules ?? User::getRulesForUpdate($this->route()->parameter('user')));
    }
}
