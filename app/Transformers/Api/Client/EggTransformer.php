<?php

namespace Pteranodon\Transformers\Api\Client;

use Pteranodon\Models\Egg;
use Pteranodon\Transformers\Api\Transformer;

class EggTransformer extends Transformer
{
    /**
     * Return the resource name for the JSONAPI output.
     */
    public function getResourceName(): string
    {
        return Egg::RESOURCE_NAME;
    }

    public function transform(Egg $model): array
    {
        return [
            'uuid' => $model->uuid,
            'name' => $model->name,
        ];
    }
}
