<?php

namespace Pellerichard\LaravelDynamicApi\Services\Facades;

use Illuminate\Support\Facades\Facade;
use Pellerichard\LaravelDynamicApi\Services\ApiBuilder;

/**
 * @method static ApiBuilder builder();
 */
class ApiService extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'dynamicApi';
    }
}
