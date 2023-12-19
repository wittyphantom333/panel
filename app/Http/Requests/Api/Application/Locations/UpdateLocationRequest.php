<?php

namespace Pteranodon\Http\Requests\Api\Application\Locations;

use Pteranodon\Models\Location;

class UpdateLocationRequest extends StoreLocationRequest
{
    public function rules(): array
    {
        $locationId = $this->route()->parameter('location');

        return collect(Location::getRulesForUpdate($locationId))->only([
            'short',
            'long',
        ])->toArray();
    }
}
