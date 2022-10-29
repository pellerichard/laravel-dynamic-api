<?php

namespace Pellerichard\LaravelDynamicApi\Http\Resources;

use Pellerichard\LaravelDynamicApi\Models\DynamicApi;

/**
 * @mixin DynamicApi
 */
class DynamicApiResource extends AbstractJsonResource
{
    public function toArray($request): array
    {
        return [
            'record_id' => $this->record_id,
            'type' => $this->type,
            'data' => json_decode($this->data, true),
        ];
    }
}
