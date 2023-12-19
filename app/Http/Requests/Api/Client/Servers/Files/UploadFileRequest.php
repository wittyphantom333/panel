<?php

namespace Pteranodon\Http\Requests\Api\Client\Servers\Files;

use Pteranodon\Models\Permission;
use Pteranodon\Http\Requests\Api\Client\ClientApiRequest;

class UploadFileRequest extends ClientApiRequest
{
    public function permission(): string
    {
        return Permission::ACTION_FILE_CREATE;
    }
}
