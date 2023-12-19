<?php

namespace Pteranodon\Transformers\Api\Client;

use Pteranodon\Models\User;
use Pteranodon\Transformers\Api\Transformer;

class AccountTransformer extends Transformer
{
    /**
     * Return the resource name for the JSONAPI output.
     */
    public function getResourceName(): string
    {
        return 'user';
    }

    /**
     * Return basic information about the currently logged-in user.
     */
    public function transform(User $model): array
    {
        return [
            'id' => $model->id,
            'admin' => $model->root_admin,
            'username' => $model->username,
            'email' => $model->email,
            'language' => $model->language,
        ];
    }
}
