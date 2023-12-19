<?php

namespace Pteranodon\Http\Requests\Api\Client\Servers\Schedules;

use Pteranodon\Models\Permission;

class DeleteScheduleRequest extends ViewScheduleRequest
{
    public function permission(): string
    {
        return Permission::ACTION_SCHEDULE_DELETE;
    }
}
