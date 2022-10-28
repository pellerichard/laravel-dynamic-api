<?php

namespace Pellerichard\LaravelDynamicApi\Services\Facades;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Facade;
use Pellerichard\LaravelDynamicApi\Http\Requests\DestroyRequest;
use Pellerichard\LaravelDynamicApi\Http\Requests\IndexRequest;
use Pellerichard\LaravelDynamicApi\Http\Requests\StoreRequest;
use Pellerichard\LaravelDynamicApi\Http\Requests\UpdateRequest;

/**
 * @method static LengthAwarePaginator index(IndexRequest|array $indexRequest);
 * @method static Model store(StoreRequest|array $storeRequest);
 * @method static bool update(UpdateRequest|array $updateRequest);
 * @method static bool destroy(DestroyRequest|array $destroyRequest);
 */
class ApiService extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'dynamicApi';
    }
}
