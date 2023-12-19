<?php

namespace Pteranodon\Contracts\Core;

use Pteranodon\Events\Event;

interface ReceivesEvents
{
    /**
     * Handles receiving an event from the application.
     */
    public function handle(Event $notification): void;
}
