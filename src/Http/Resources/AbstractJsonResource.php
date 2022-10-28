<?php

namespace Pellerichard\LaravelDynamicApi\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

abstract class AbstractJsonResource extends JsonResource
{
    use Paginateable;

    public static $wrap = 'data';

    public function with($request): iterable
    {
        return $this->paginateable();
    }
}
