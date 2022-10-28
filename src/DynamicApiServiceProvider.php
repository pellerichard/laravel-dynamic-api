<?php

namespace Pellerichard\LaravelDynamicApi;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as DefaultServiceProvider;
use Pellerichard\LaravelDynamicApi\Models\DynamicApi;
use Pellerichard\LaravelDynamicApi\Observers\DynamicApiObserver;
use Pellerichard\LaravelDynamicApi\Providers\ControllerProvider;
use Pellerichard\LaravelDynamicApi\Providers\RepositoryServiceProvider;
use Pellerichard\LaravelDynamicApi\Providers\ServiceProvider;
use Pellerichard\LaravelDynamicApi\Providers\FacadeProvider;

class DynamicApiServiceProvider extends DefaultServiceProvider
{
    const CONFIG_PATH = __DIR__ . '/../config/dynamic-api.php';

    /**
     * @var array|string[]
     */
    private array $providers = [
        RepositoryServiceProvider::class,
        ServiceProvider::class,
        ControllerProvider::class,
        FacadeProvider::class,
    ];

    public function boot()
    {
        DynamicApi::observe(DynamicApiObserver::class);

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        if (config('dynamic-api.endpoints') === true) {
            Route::group([
                'prefix' => config('dynamic-api.endpoint_rules.prefix'),
                'middleware' => config('dynamic-api.endpoint_rules.middleware'),
            ], fn () => $this->loadRoutesFrom(__DIR__ . '/../routes/dynamic-api-routes.php'));
        }

        $this->publishes([
            self::CONFIG_PATH => config_path('dynamic-api.php'),
        ], 'config');
    }

    public function register()
    {
        collect($this->providers)->each(fn (string $provider) => $this->app->register($provider));

        $this->mergeConfigFrom(
            self::CONFIG_PATH,
            'dynamic-api'
        );
    }
}
