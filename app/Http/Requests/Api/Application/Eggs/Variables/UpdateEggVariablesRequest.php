<?php

namespace Pteranodon\Http\Requests\Api\Application\Eggs\Variables;

use Pteranodon\Models\EggVariable;
use Pteranodon\Http\Requests\Api\Application\ApplicationApiRequest;

class UpdateEggVariablesRequest extends ApplicationApiRequest
{
    public function rules(array $rules = null): array
    {
        return [
            '*' => 'array',
            '*.id' => 'required|integer',
            '*.name' => 'sometimes|string|min:1|max:191',
            '*.description' => 'sometimes|string|nullable',
            '*.env_variable' => 'sometimes|regex:/^[\w]{1,191}$/|notIn:' . EggVariable::RESERVED_ENV_NAMES,
            '*.default_value' => 'sometimes|present',
            '*.user_viewable' => 'sometimes|boolean',
            '*.user_editable' => 'sometimes|boolean',
            '*.rules' => 'sometimes|string',
        ];
    }
}
