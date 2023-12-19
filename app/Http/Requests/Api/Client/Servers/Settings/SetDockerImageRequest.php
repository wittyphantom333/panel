<?php

namespace Pteranodon\Http\Requests\Api\Client\Servers\Settings;

use Webmozart\Assert\Assert;
use Pteranodon\Models\Server;
use Illuminate\Validation\Rule;
use Pteranodon\Models\Permission;
use Pteranodon\Contracts\Http\ClientPermissionsRequest;
use Pteranodon\Http\Requests\Api\Client\ClientApiRequest;

class SetDockerImageRequest extends ClientApiRequest implements ClientPermissionsRequest
{
    public function permission(): string
    {
        return Permission::ACTION_STARTUP_DOCKER_IMAGE;
    }

    public function rules(): array
    {
        /** @var \Pteranodon\Models\Server $server */
        $server = $this->route()->parameter('server');

        Assert::isInstanceOf($server, Server::class);

        return [
            'docker_image' => ['required', 'string', Rule::in(array_values($server->egg->docker_images))],
        ];
    }
}
