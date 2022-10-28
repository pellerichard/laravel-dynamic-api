<?php

namespace Pellerichard\LaravelDynamicApi\Providers;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Pellerichard\LaravelDynamicApi\Services\ApiService;
use Pellerichard\LaravelDynamicApi\Services\Contracts\ApiServiceInterface;

class ServiceProvider extends LaravelServiceProvider
{
    public function register()
    {
        $this->app->bind(ApiServiceInterface::class, ApiService::class);
    }
}
