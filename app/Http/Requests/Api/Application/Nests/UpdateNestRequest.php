<?php

namespace Pteranodon\Http\Requests\Api\Application\Nests;

use Pteranodon\Models\Nest;

class UpdateNestRequest extends StoreNestRequest
{
    public function rules(array $rules = null): array
    {
        return $rules ?? Nest::getRulesForUpdate($this->route()->parameter('nest'));
    }
}
