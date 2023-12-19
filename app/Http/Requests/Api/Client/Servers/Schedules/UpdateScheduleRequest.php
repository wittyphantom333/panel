<?php

namespace Pteranodon\Http\Requests\Api\Client\Servers\Schedules;

use Pteranodon\Models\Permission;

class UpdateScheduleRequest extends StoreScheduleRequest
{
    public function permission(): string
    {
        return Permission::ACTION_SCHEDULE_UPDATE;
    }
}
