<?php

namespace Pteranodon\Facades;

use Illuminate\Support\Facades\Facade;
use Pteranodon\Services\Activity\ActivityLogBatchService;

class LogBatch extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ActivityLogBatchService::class;
    }
}
