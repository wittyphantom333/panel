<?php

namespace Pteranodon\Providers;

use Illuminate\Support\ServiceProvider;
use Pteranodon\Repositories\Eloquent\EggRepository;
use Pteranodon\Repositories\Eloquent\NestRepository;
use Pteranodon\Repositories\Eloquent\NodeRepository;
use Pteranodon\Repositories\Eloquent\TaskRepository;
use Pteranodon\Repositories\Eloquent\UserRepository;
use Pteranodon\Repositories\Eloquent\ApiKeyRepository;
use Pteranodon\Repositories\Eloquent\ServerRepository;
use Pteranodon\Repositories\Eloquent\SessionRepository;
use Pteranodon\Repositories\Eloquent\SubuserRepository;
use Pteranodon\Repositories\Eloquent\DatabaseRepository;
use Pteranodon\Repositories\Eloquent\LocationRepository;
use Pteranodon\Repositories\Eloquent\ScheduleRepository;
use Pteranodon\Repositories\Eloquent\SettingsRepository;
use Pteranodon\Repositories\Eloquent\AllocationRepository;
use Pteranodon\Contracts\Repository\EggRepositoryInterface;
use Pteranodon\Repositories\Eloquent\EggVariableRepository;
use Pteranodon\Contracts\Repository\NestRepositoryInterface;
use Pteranodon\Contracts\Repository\NodeRepositoryInterface;
use Pteranodon\Contracts\Repository\TaskRepositoryInterface;
use Pteranodon\Contracts\Repository\UserRepositoryInterface;
use Pteranodon\Repositories\Eloquent\DatabaseHostRepository;
use Pteranodon\Contracts\Repository\ApiKeyRepositoryInterface;
use Pteranodon\Contracts\Repository\ServerRepositoryInterface;
use Pteranodon\Repositories\Eloquent\ServerVariableRepository;
use Pteranodon\Contracts\Repository\SessionRepositoryInterface;
use Pteranodon\Contracts\Repository\SubuserRepositoryInterface;
use Pteranodon\Contracts\Repository\DatabaseRepositoryInterface;
use Pteranodon\Contracts\Repository\LocationRepositoryInterface;
use Pteranodon\Contracts\Repository\ScheduleRepositoryInterface;
use Pteranodon\Contracts\Repository\SettingsRepositoryInterface;
use Pteranodon\Contracts\Repository\AllocationRepositoryInterface;
use Pteranodon\Contracts\Repository\EggVariableRepositoryInterface;
use Pteranodon\Contracts\Repository\DatabaseHostRepositoryInterface;
use Pteranodon\Contracts\Repository\ServerVariableRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register all the repository bindings.
     */
    public function register(): void
    {
        // Eloquent Repositories
        $this->app->bind(AllocationRepositoryInterface::class, AllocationRepository::class);
        $this->app->bind(ApiKeyRepositoryInterface::class, ApiKeyRepository::class);
        $this->app->bind(DatabaseRepositoryInterface::class, DatabaseRepository::class);
        $this->app->bind(DatabaseHostRepositoryInterface::class, DatabaseHostRepository::class);
        $this->app->bind(EggRepositoryInterface::class, EggRepository::class);
        $this->app->bind(EggVariableRepositoryInterface::class, EggVariableRepository::class);
        $this->app->bind(LocationRepositoryInterface::class, LocationRepository::class);
        $this->app->bind(NestRepositoryInterface::class, NestRepository::class);
        $this->app->bind(NodeRepositoryInterface::class, NodeRepository::class);
        $this->app->bind(ScheduleRepositoryInterface::class, ScheduleRepository::class);
        $this->app->bind(ServerRepositoryInterface::class, ServerRepository::class);
        $this->app->bind(ServerVariableRepositoryInterface::class, ServerVariableRepository::class);
        $this->app->bind(SessionRepositoryInterface::class, SessionRepository::class);
        $this->app->bind(SettingsRepositoryInterface::class, SettingsRepository::class);
        $this->app->bind(SubuserRepositoryInterface::class, SubuserRepository::class);
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
