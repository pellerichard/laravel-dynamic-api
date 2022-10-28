<?php

namespace Pellerichard\LaravelDynamicApi\Providers;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Pellerichard\LaravelDynamicApi\Http\Controllers\ApiController;
use Pellerichard\LaravelDynamicApi\Http\Controllers\Contracts\ApiControllerInterface;

class ControllerProvider extends LaravelServiceProvider
{
    public function register()
    {
        $this->app->bind(ApiControllerInterface::class, ApiController::class);
    }
}
