<?php

namespace Pteranodon\Http\Controllers\Api\Application;

use Illuminate\Http\JsonResponse;
use Pteranodon\Services\Helpers\SoftwareVersionService;

class VersionController extends ApplicationApiController
{
    /**
     * VersionController constructor.
     */
    public function __construct(private SoftwareVersionService $softwareVersionService)
    {
        parent::__construct();
    }

    /**
     * Returns version information.
     */
    public function __invoke(): JsonResponse
    {
        return new JsonResponse($this->softwareVersionService->getVersionData());
    }
}
