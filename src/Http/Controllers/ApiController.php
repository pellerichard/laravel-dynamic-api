<?php

namespace Pellerichard\LaravelDynamicApi\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Pellerichard\LaravelDynamicApi\Http\Controllers\Contracts\ApiControllerInterface;
use Pellerichard\LaravelDynamicApi\Http\Requests\DestroyRequest;
use Pellerichard\LaravelDynamicApi\Http\Requests\IndexRequest;
use Pellerichard\LaravelDynamicApi\Http\Requests\StoreRequest;
use Pellerichard\LaravelDynamicApi\Http\Requests\UpdateRequest;
use Pellerichard\LaravelDynamicApi\Http\Resources\DynamicApiResourceCollection;
use Pellerichard\LaravelDynamicApi\Services\Contracts\ApiServiceInterface;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller implements ApiControllerInterface
{
    /**
     * @param ApiServiceInterface $apiService
     */
    public function __construct(private readonly ApiServiceInterface $apiService)
    {

    }

    /**
     * @inheritDoc
     */
    public function index(IndexRequest $indexRequest): JsonResponse
    {
        try {
            $data = $this->apiService->index(indexRequest: $indexRequest);

            return (new DynamicApiResourceCollection($data))->response();
        } catch(\Exception $exception) {
            return response()->json(
                data: ['error_message' => $exception->getMessage()],
                status: Response::HTTP_FORBIDDEN
            );
        }
    }

    /**
     * @inheritDoc
     */
    public function store(StoreRequest $storeRequest): JsonResponse
    {
        try {
            $this->apiService->store(storeRequest: $storeRequest);

            return response()->json(status: Response::HTTP_OK);
        } catch(\Exception $exception) {
            return response()->json(
                data: ['error_message' => $exception->getMessage()],
                status: Response::HTTP_FORBIDDEN
            );
        }
    }

    /**
     * @inheritDoc
     */
    public function update(UpdateRequest $updateRequest): JsonResponse
    {
        try {
            $this->apiService->update(updateRequest: $updateRequest);

            return response()->json(status: Response::HTTP_OK);
        } catch(\Exception $exception) {
            return response()->json(
                data: ['error_message' => $exception->getMessage()],
                status: Response::HTTP_FORBIDDEN
            );
        }
    }

    /**
     * @inheritDoc
     */
    public function destroy(DestroyRequest $destroyRequest): JsonResponse
    {
        try {
            $this->apiService->destroy(destroyRequest: $destroyRequest);

            return response()->json(status: Response::HTTP_OK);
        } catch(\Exception $exception) {
            return response()->json(
                data: ['error_message' => $exception->getMessage()],
                status: Response::HTTP_FORBIDDEN
            );
        }
    }
}
