<?php

namespace Pteranodon\Http\Controllers\Api\Application\Nodes;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Pteranodon\Models\Node;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Cache\Repository as CacheRepository;
use Pteranodon\Repositories\Wings\DaemonConfigurationRepository;
use Pteranodon\Http\Controllers\Api\Application\ApplicationApiController;

class NodeInformationController extends ApplicationApiController
{
    /**
     * NodeInformationController constructor.
     */
    public function __construct(private CacheRepository $cache, private DaemonConfigurationRepository $repository)
    {
        parent::__construct();
    }

    /**
     * Returns system information from the node.
     *
     * @throws \Pteranodon\Exceptions\Http\Connection\DaemonConnectionException
     */
    public function __invoke(Request $request, Node $node): JsonResponse
    {
        $data = $this->cache
            ->tags(['nodes'])
            ->remember($node->uuid, Carbon::now()->addSeconds(30), function () use ($node) {
                return $this->repository->setNode($node)->getSystemInformation();
            });

        return new JsonResponse([
            'version' => $data['version'] ?? null,
            'system' => [
                'type' => Str::title($data['os'] ?? 'Unknown'),
                'arch' => $data['architecture'] ?? null,
                'release' => $data['kernel_version'] ?? null,
                'cpus' => $data['cpu_count'] ?? null,
            ],
        ]);
    }
}
