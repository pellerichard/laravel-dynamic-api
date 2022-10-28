<?php

namespace Pellerichard\LaravelDynamicApi\Http\Controllers;

use App\Http\Controllers\Controller;
use Pellerichard\LaravelDynamicApi\Http\Requests\DestroyRequest;
use Pellerichard\LaravelDynamicApi\Http\Requests\IndexRequest;
use Pellerichard\LaravelDynamicApi\Http\Requests\StoreRequest;
use Pellerichard\LaravelDynamicApi\Http\Requests\UpdateRequest;
use Pellerichard\LaravelDynamicApi\Services\Facades\ApiService;

class ManualApiController extends Controller
{
    public function index()
    {
        // Retrieve every entity.
        ApiService::update([
            'table_name' => 'my_table_name',
            'table_id' => 1,
            'first_column' => 'Lorem Ipsum',
            'second_column' => 'Dolor Sit',
            'third_column' => 'Amet'
        ]);

        // Retrieve a specific entity.
        ApiService::index([
            'table_name' => 'my_table_name',
            'table_id' => 1
        ]);

        // Create an entity.
        ApiService::store([
            'table_name' => 'my_table_name',
            'table_id' => 1,
            'my_amazing_column' => 'Hello World!',
            'my_favourite_song' => 'nyancat',
            'test' => true
        ]);

        // Update a specific entity.
        ApiService::update(new UpdateRequest([
            'table_name' => 'my_table_name',
            'table_id' => 1,
            'first_column' => 'Lorem Ipsum',
            'second_column' => 'Dolor Sit',
            'third_column' => 'Amet'
        ]));

        // Delete a specific entity.
        ApiService::destroy(new DestroyRequest([
            'table_name' => 'my_table_name',
            'table_id' => 1
        ]));
    }
}
