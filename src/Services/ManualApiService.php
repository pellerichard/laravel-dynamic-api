<?php

namespace Pellerichard\LaravelDynamicApi\Services;

class ManualApiService
{
    /**
     * @return ApiBuilder
     */
    public static function builder(): ApiBuilder
    {
        return app()->make(ApiBuilder::class);
    }
}
