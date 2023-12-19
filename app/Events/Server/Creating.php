<?php

namespace Pteranodon\Events\Server;

use Pteranodon\Events\Event;
use Pteranodon\Models\Server;
use Illuminate\Queue\SerializesModels;

class Creating extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public Server $server)
    {
    }
}
