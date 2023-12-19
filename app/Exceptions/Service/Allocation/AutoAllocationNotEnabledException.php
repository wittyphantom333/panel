<?php

namespace Pteranodon\Exceptions\Service\Allocation;

use Pteranodon\Exceptions\DisplayException;

class AutoAllocationNotEnabledException extends DisplayException
{
    /**
     * AutoAllocationNotEnabledException constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'Server auto-allocation is not enabled for this instance.'
        );
    }
}
