<?php

namespace Pteranodon\Http\Controllers\Api\Application\Roles;

use Illuminate\Http\Response;
use Pteranodon\Models\AdminRole;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\QueryBuilder;
use Pteranodon\Exceptions\Http\QueryValueOutOfRangeHttpException;
use Pteranodon\Transformers\Api\Application\AdminRoleTransformer;
use Pteranodon\Http\Requests\Api\Application\Roles\GetRoleRequest;
use Pteranodon\Http\Requests\Api\Application\Roles\GetRolesRequest;
use Pteranodon\Http\Requests\Api\Application\Roles\StoreRoleRequest;
use Pteranodon\Http\Requests\Api\Application\Roles\DeleteRoleRequest;
use Pteranodon\Http\Requests\Api\Application\Roles\UpdateRoleRequest;
use Pteranodon\Http\Controllers\Api\Application\ApplicationApiController;

class RoleController extends ApplicationApiController
{
    /**
     * RoleController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Returns an array of all roles.
     */
    public function index(GetRolesRequest $request): array
    {
        $perPage = (int) $request->query('per_page', '10');
        if ($perPage < 1 || $perPage > 100) {
            throw new QueryValueOutOfRangeHttpException('per_page', 1, 100);
        }

        $roles = QueryBuilder::for(AdminRole::query())
            ->allowedFilters(['id', 'name'])
            ->allowedSorts(['id', 'name'])
            ->paginate($perPage);

        return $this->fractal->collection($roles)
            ->transformWith(AdminRoleTransformer::class)
            ->toArray();
    }

    /**
     * Returns a single role.
     */
    public function view(GetRoleRequest $request, AdminRole $role): array
    {
        return $this->fractal->item($role)
            ->transformWith(AdminRoleTransformer::class)
            ->toArray();
    }

    /**
     * Creates a new role.
     */
    public function store(StoreRoleRequest $request): JsonResponse
    {
        $data = array_merge($request->validated(), [
            'sort_id' => 99,
        ]);
        $role = AdminRole::query()->create($data);

        return $this->fractal->item($role)
            ->transformWith(AdminRoleTransformer::class)
            ->respond(JsonResponse::HTTP_CREATED);
    }

    /**
     * Updates a role.
     */
    public function update(UpdateRoleRequest $request, AdminRole $role): array
    {
        $role->update($request->validated());

        return $this->fractal->item($role)
            ->transformWith(AdminRoleTransformer::class)
            ->toArray();
    }

    /**
     * Deletes a role.
     *
     * @throws \Exception
     */
    public function delete(DeleteRoleRequest $request, AdminRole $role): Response
    {
        $role->delete();

        return $this->returnNoContent();
    }
}
