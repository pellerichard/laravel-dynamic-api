<?php

namespace Pellerichard\LaravelDynamicApi\Http\Resources;

use Illuminate\Pagination\LengthAwarePaginator;

/**
 * @package Adroitgroup\Category\Http\Resources
 * @mixin LengthAwarePaginator
 */
class DynamicApiResourceCollection extends AbstractJsonResource
{
    /**
     * @param $request
     * @return iterable
     */
    public function toArray($request): iterable
    {
        return DynamicApiResource::collection($this->items());
    }
}
