<?php

namespace Pteranodon\Exceptions\Http\Server;

use Pteranodon\Exceptions\DisplayException;

class FileSizeTooLargeException extends DisplayException
{
    /**
     * FileSizeTooLargeException constructor.
     */
    public function __construct()
    {
        parent::__construct('The file you are attempting to open is too large to view in the file editor.');
    }
}
