<?php

namespace Pteranodon\Http\Requests\Api\Application\Databases;

use Pteranodon\Models\DatabaseHost;
use Pteranodon\Http\Requests\Api\Application\ApplicationApiRequest;

class StoreDatabaseRequest extends ApplicationApiRequest
{
    public function rules(array $rules = null): array
    {
        return $rules ?? DatabaseHost::getRules();
    }
}
