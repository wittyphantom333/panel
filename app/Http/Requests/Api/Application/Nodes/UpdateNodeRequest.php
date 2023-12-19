<?php

namespace Pteranodon\Http\Requests\Api\Application\Nodes;

use Pteranodon\Models\Node;

class UpdateNodeRequest extends StoreNodeRequest
{
    public function rules(array $rules = null): array
    {
        return parent::rules($rules ?? Node::getRulesForUpdate($this->route()->parameter('node')));
    }
}
