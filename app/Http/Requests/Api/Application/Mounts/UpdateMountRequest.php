<?php

namespace Pteranodon\Http\Requests\Api\Application\Mounts;

use Pteranodon\Models\Mount;

class UpdateMountRequest extends StoreMountRequest
{
    public function rules(array $rules = null): array
    {
        return $rules ?? Mount::getRulesForUpdate($this->route()->parameter('mount'));
    }
}
