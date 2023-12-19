<?php

namespace Pteranodon\Providers;

use Pteranodon\Models\User;
use Pteranodon\Models\Server;
use Pteranodon\Models\Subuser;
use Pteranodon\Models\EggVariable;
use Pteranodon\Observers\UserObserver;
use Pteranodon\Observers\ServerObserver;
use Pteranodon\Observers\SubuserObserver;
use Pteranodon\Observers\EggVariableObserver;
use Pteranodon\Listeners\Auth\AuthenticationListener;
use Pteranodon\Events\Server\Installed as ServerInstalledEvent;
use Pteranodon\Notifications\ServerInstalled as ServerInstalledNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     */
    protected $listen = [
        ServerInstalledEvent::class => [ServerInstalledNotification::class],
    ];

    protected $subscribe = [
        AuthenticationListener::class,
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        parent::boot();

        User::observe(UserObserver::class);
        Server::observe(ServerObserver::class);
        Subuser::observe(SubuserObserver::class);
        EggVariable::observe(EggVariableObserver::class);
    }
}
