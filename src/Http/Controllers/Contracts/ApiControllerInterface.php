<?php

namespace Pellerichard\LaravelDynamicApi\Http\Controllers\Contracts;

use Illuminate\Http\JsonResponse;
use Pellerichard\LaravelDynamicApi\Http\Requests\DestroyRequest;
use Pellerichard\LaravelDynamicApi\Http\Requests\IndexRequest;
use Pellerichard\LaravelDynamicApi\Http\Requests\StoreRequest;
use Pellerichard\LaravelDynamicApi\Http\Requests\UpdateRequest;

interface ApiControllerInterface
{
    /**
     * Displays every entity within the API.
     *
     * @param IndexRequest $indexRequest
     *
     * @return JsonResponse
     */
    public function index(IndexRequest $indexRequest): JsonResponse;

    /**
     * Stores an entity within the API.
     *
     * @param StoreRequest $storeRequest
     *
     * @return JsonResponse
     */
    public function store(StoreRequest $storeRequest): JsonResponse;

    /**
     * Updates a specific entity within the API.
     *
     * @param UpdateRequest $updateRequest
     *
     * @return JsonResponse
     */
    public function update(UpdateRequest $updateRequest): JsonResponse;

    /**
     * Deletes a specific entity within the API.
     *
     * @param DestroyRequest $destroyRequest
     *
     * @return JsonResponse
     */
    public function destroy(DestroyRequest $destroyRequest): JsonResponse;
}
