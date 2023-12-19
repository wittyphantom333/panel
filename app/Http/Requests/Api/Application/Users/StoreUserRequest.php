<?php

namespace Pteranodon\Http\Requests\Api\Application\Users;

use Pteranodon\Models\User;
use Pteranodon\Http\Requests\Api\Application\ApplicationApiRequest;

class StoreUserRequest extends ApplicationApiRequest
{
    public function rules(array $rules = null): array
    {
        $rules = $rules ?? User::getRules();

        return collect($rules)->only([
            'external_id',
            'email',
            'username',
            'password',
            'admin_role_id',
            'root_admin',
        ])->toArray();
    }
}
