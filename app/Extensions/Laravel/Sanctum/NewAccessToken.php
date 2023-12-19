<?php

namespace Pteranodon\Extensions\Laravel\Sanctum;

use Pteranodon\Models\ApiKey;
use Laravel\Sanctum\NewAccessToken as SanctumAccessToken;

/**
 * @property \Pteranodon\Models\ApiKey $accessToken
 */
class NewAccessToken extends SanctumAccessToken
{
    /**
     * NewAccessToken constructor.
     *
     * @noinspection PhpMissingParentConstructorInspection
     */
    public function __construct(ApiKey $accessToken, string $plainTextToken)
    {
        $this->accessToken = $accessToken;
        $this->plainTextToken = $plainTextToken;
    }
}
