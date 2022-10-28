<?php

namespace Pellerichard\LaravelDynamicApi\Providers;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Pellerichard\LaravelDynamicApi\Http\Repositories\ApiRepository;
use Pellerichard\LaravelDynamicApi\Models\DynamicApi;
use Pellerichard\LaravelDynamicApi\Services\ApiService;
use Pellerichard\LaravelDynamicApi\Services\Facades\ApiService as ApiServiceFacade;

class FacadeProvider extends LaravelServiceProvider
{
    public function register()
    {
        $this->app->bind('dynamicApi', function () {
            return new ApiService(new ApiRepository(new DynamicApi()));
        });

        $this->app->alias('ApiService', ApiServiceFacade::class);
    }
}
