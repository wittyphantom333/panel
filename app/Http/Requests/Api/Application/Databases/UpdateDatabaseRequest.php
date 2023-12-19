<?php

namespace Pteranodon\Http\Requests\Api\Application\Databases;

use Pteranodon\Models\DatabaseHost;

class UpdateDatabaseRequest extends StoreDatabaseRequest
{
    public function rules(array $rules = null): array
    {
        return $rules ?? DatabaseHost::getRulesForUpdate($this->route()->parameter('databaseHost'));
    }
}
