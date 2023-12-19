<?php

namespace Pteranodon\Http\Requests\Api\Application\Mounts;

use Pteranodon\Models\Mount;
use Pteranodon\Http\Requests\Api\Application\ApplicationApiRequest;

class StoreMountRequest extends ApplicationApiRequest
{
    public function rules(array $rules = null): array
    {
        return $rules ?? Mount::getRules();
    }
}
