<?php

namespace Pellerichard\LaravelDynamicApi\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Pellerichard\LaravelDynamicApi\Http\Repositories\Contracts\ApiRepositoryInterface;
use Pellerichard\LaravelDynamicApi\Http\Requests\DestroyRequest;
use Pellerichard\LaravelDynamicApi\Http\Requests\IndexRequest;
use Pellerichard\LaravelDynamicApi\Http\Requests\StoreRequest;
use Pellerichard\LaravelDynamicApi\Http\Requests\UpdateRequest;
use Pellerichard\LaravelDynamicApi\Services\Contracts\ApiServiceInterface;

class ApiService extends AbstractService implements ApiServiceInterface
{
    public function __construct(private readonly ApiRepositoryInterface $apiRepository)
    {

    }

    /**
     * @inheritDoc
     */
    public function index(IndexRequest|array $indexRequest): LengthAwarePaginator
    {
        $this->generalizeRequest(IndexRequest::class, $indexRequest);

        return $this->apiRepository->getAll(
            filter: $indexRequest->collect()
        );
    }

    /**
     * @inheritDoc
     */
    public function store(StoreRequest|array $storeRequest): Model
    {
        $this->generalizeRequest(StoreRequest::class, $storeRequest);

        return $this->apiRepository->create(
            data: $storeRequest->validated() + ['data' => json_encode($storeRequest->getTableData())]
        );
    }

    /**
     * @inheritDoc
     */
    public function update(UpdateRequest|array $updateRequest): bool
    {
        $this->generalizeRequest(UpdateRequest::class, $updateRequest);

        return $this->apiRepository->updateByRecordIdAndTypeWithData(
            recordId: $updateRequest->get('record_id'),
            type: $updateRequest->get('type'),
            data: $updateRequest->getTableData()
        );
    }

    /**
     * @inheritDoc
     */
    public function destroy(DestroyRequest|array $destroyRequest): bool
    {
        $this->generalizeRequest(DestroyRequest::class, $destroyRequest);

        return $this->apiRepository->destroyByRecordIdAndType(
            recordId: $destroyRequest->get('record_id'),
            type: $destroyRequest->get('type'),
        );
    }
}
