<?php

namespace Pellerichard\LaravelDynamicApi\Providers;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Pellerichard\LaravelDynamicApi\Services\Facades\ApiService as ApiServiceFacade;
use Pellerichard\LaravelDynamicApi\Services\ManualApiService;

class FacadeProvider extends LaravelServiceProvider
{
    public function register()
    {
        $this->app->bind('dynamicApi', function () {
            return new ManualApiService();
        });

        $this->app->alias('ApiService', ApiServiceFacade::class);
    }
}
