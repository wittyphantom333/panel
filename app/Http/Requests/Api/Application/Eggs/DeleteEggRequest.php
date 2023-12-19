<?php

namespace Pteranodon\Http\Requests\Api\Application\Eggs;

use Pteranodon\Models\Egg;
use Pteranodon\Http\Requests\Api\Application\ApplicationApiRequest;

class DeleteEggRequest extends ApplicationApiRequest
{
    public function resourceExists(): bool
    {
        $egg = $this->route()->parameter('egg');

        return $egg instanceof Egg && $egg->exists;
    }
}
