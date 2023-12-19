<?php

namespace Pteranodon\Http\Requests\Api\Client\Servers\Settings;

use Pteranodon\Models\Permission;
use Pteranodon\Http\Requests\Api\Client\ClientApiRequest;

class ReinstallServerRequest extends ClientApiRequest
{
    public function permission(): string
    {
        return Permission::ACTION_SETTINGS_REINSTALL;
    }
}
