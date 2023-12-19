<?php

namespace Pteranodon\Events\Auth;

use Pteranodon\Models\User;
use Pteranodon\Events\Event;

class ProvidedAuthenticationToken extends Event
{
    public function __construct(public User $user, public bool $recovery = false)
    {
    }
}
