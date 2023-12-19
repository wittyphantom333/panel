<?php

namespace Pteranodon\Transformers\Api\Client;

use Pteranodon\Models\Subuser;
use Pteranodon\Transformers\Api\Transformer;

class SubuserTransformer extends Transformer
{
    /**
     * Return the resource name for the JSONAPI output.
     */
    public function getResourceName(): string
    {
        return Subuser::RESOURCE_NAME;
    }

    /**
     * Transforms a subuser into a model that can be shown to a front-end user.
     */
    public function transform(Subuser $model): array
    {
        return array_merge(
            (new UserTransformer())->transform($model->user),
            ['permissions' => $model->permissions]
        );
    }
}
