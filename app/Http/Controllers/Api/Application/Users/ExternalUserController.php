<?php

namespace Pteranodon\Http\Controllers\Api\Application\Users;

use Pteranodon\Models\User;
use Pteranodon\Transformers\Api\Application\UserTransformer;
use Pteranodon\Http\Controllers\Api\Application\ApplicationApiController;
use Pteranodon\Http\Requests\Api\Application\Users\GetExternalUserRequest;

class ExternalUserController extends ApplicationApiController
{
    /**
     * Retrieve a specific user from the database using their external ID.
     */
    public function index(GetExternalUserRequest $request, string $external_id): array
    {
        $user = User::query()->where('external_id', $external_id)->firstOrFail();

        return $this->fractal->item($user)
            ->transformWith(UserTransformer::class)
            ->toArray();
    }
}
