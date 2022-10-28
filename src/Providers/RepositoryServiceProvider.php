<?php

namespace Pellerichard\LaravelDynamicApi\Providers;

use Illuminate\Support\ServiceProvider;
use Pellerichard\LaravelDynamicApi\Http\Repositories\ApiRepository;
use Pellerichard\LaravelDynamicApi\Http\Repositories\Contracts\ApiRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ApiRepositoryInterface::class, ApiRepository::class);
    }
}
