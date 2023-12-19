<?php

namespace Pteranodon\Exceptions\Service;

use Illuminate\Http\Response;
use Pteranodon\Exceptions\DisplayException;

class HasActiveServersException extends DisplayException
{
    public function getStatusCode(): int
    {
        return Response::HTTP_BAD_REQUEST;
    }
}
