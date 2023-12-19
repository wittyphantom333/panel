<?php

namespace Pteranodon\Events\Subuser;

use Pteranodon\Events\Event;
use Pteranodon\Models\Subuser;
use Illuminate\Queue\SerializesModels;

class Deleted extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public Subuser $subuser)
    {
    }
}
