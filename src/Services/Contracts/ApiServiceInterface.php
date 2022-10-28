<?php

namespace Pellerichard\LaravelDynamicApi\Services\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Pellerichard\LaravelDynamicApi\Http\Requests\DestroyRequest;
use Pellerichard\LaravelDynamicApi\Http\Requests\IndexRequest;
use Pellerichard\LaravelDynamicApi\Http\Requests\StoreRequest;
use Pellerichard\LaravelDynamicApi\Http\Requests\UpdateRequest;

interface ApiServiceInterface
{
    /**
     * Displays every entity within the API.
     *
     * @param IndexRequest|array $indexRequest
     *
     * @return LengthAwarePaginator
     */
    public function index(IndexRequest|array $indexRequest): LengthAwarePaginator;

    /**
     * Stores an entity within the API.
     *
     * @param StoreRequest|array $storeRequest
     *
     * @return Model
     */
    public function store(StoreRequest|array $storeRequest): Model;

    /**
     * Updates a specific entity within the API.
     *
     * @param UpdateRequest|array $updateRequest
     *
     * @return bool
     */
    public function update(UpdateRequest|array $updateRequest): bool;

    /**
     * Deletes a specific entity within the API.
     *
     * @param DestroyRequest|array $destroyRequest
     *
     * @return bool
     */
    public function destroy(DestroyRequest|array $destroyRequest): bool;
}
