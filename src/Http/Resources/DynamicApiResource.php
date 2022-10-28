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
            'table_id' => $this->table_id,
            'table_name' => $this->table_name,
            'table_data' => json_decode($this->table_data, true),
        ];
    }
}
