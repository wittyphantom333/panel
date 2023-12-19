<?php

namespace Pteranodon\Exceptions\Service\Database;

use Pteranodon\Exceptions\PteranodonException;

class DatabaseClientFeatureNotEnabledException extends PteranodonException
{
    public function __construct()
    {
        parent::__construct('Client database creation is not enabled in this Panel.');
    }
}
