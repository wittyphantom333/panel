<?php

namespace Pteranodon\Http\Controllers\Api\Client;

use Pteranodon\Models\ActivityLog;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Pteranodon\Http\Requests\Api\Client\ClientApiRequest;
use Pteranodon\Transformers\Api\Client\ActivityLogTransformer;

class ActivityLogController extends ClientApiController
{
    /**
     * Returns a paginated set of the user's activity logs.
     */
    public function __invoke(ClientApiRequest $request): array
    {
        $activity = QueryBuilder::for($request->user()->activity())
            ->with('actor')
            ->allowedFilters([AllowedFilter::partial('event')])
            ->allowedSorts(['timestamp'])
            ->whereNotIn('activity_logs.event', ActivityLog::DISABLED_EVENTS)
            ->paginate(min($request->query('per_page', 25), 100))
            ->appends($request->query());

        return $this->fractal->collection($activity)
            ->transformWith(ActivityLogTransformer::class)
            ->toArray();
    }
}
