<?php

namespace Pteranodon\Http\Requests\Api\Application\Roles;

use Pteranodon\Models\AdminRole;
use Pteranodon\Http\Requests\Api\Application\ApplicationApiRequest;

class StoreRoleRequest extends ApplicationApiRequest
{
    public function rules(array $rules = null): array
    {
        return $rules ?? AdminRole::getRules();
    }
}
