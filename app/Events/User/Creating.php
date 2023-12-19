<?php

namespace Pteranodon\Events\User;

use Pteranodon\Models\User;
use Pteranodon\Events\Event;
use Illuminate\Queue\SerializesModels;

class Creating extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public User $user)
    {
    }
}
