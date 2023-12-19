<?php

namespace Pteranodon\Http\Requests\Api\Application\Nests;

use Pteranodon\Models\Nest;
use Pteranodon\Http\Requests\Api\Application\ApplicationApiRequest;

class StoreNestRequest extends ApplicationApiRequest
{
    public function rules(array $rules = null): array
    {
        return $rules ?? Nest::getRules();
    }
}
