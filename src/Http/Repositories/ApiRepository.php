<?php

namespace Pellerichard\LaravelDynamicApi\Http\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Pellerichard\LaravelDynamicApi\Http\Repositories\Contracts\ApiRepositoryInterface;
use Pellerichard\LaravelDynamicApi\Models\DynamicApi;

class ApiRepository implements ApiRepositoryInterface
{
    public function __construct(private readonly DynamicApi $model)
    {

    }

    /**
     * @inheritDoc
     */
    public function getAll(Collection $filter): LengthAwarePaginator|EloquentCollection
    {
        $result = $this->model
            ->statements($filter);

        if (! $filter->get('withPagination')) {
            return $result->get();
        }

        return $result->paginate(perPage: $filter->get('per_page'));
    }

    /**
     * @inheritDoc
     */
    public function findOneByTypeAndRecordId(Collection $filter, string $type, int $recordId): Model
    {
        return $this->model
            ->where(column: [
                'type' => $type,
                'record_id' => $recordId,
            ])
            ->firstOrFail();
    }

    /**
     * @inheritDoc
     */
    public function destroyByRecordIdAndType(int $recordId, string $type): bool
    {
        return $this->model
            ->where(column: [
                'type' => $type,
                'record_id' => $recordId,
            ])
            ->firstOrFail()
            ->deleteOrFail();
    }

    /**
     * @inheritDoc
     */
    public function updateByRecordIdAndTypeWithData(int $recordId, string $type, array $data): bool
    {
        /** @var DynamicApi $model */
        $this->model->data = $this->findOneByTypeAndRecordId(
            filter: collect(),
            type: $type,
            recordId: $recordId,
        )?->mergeDataWithArray($data);

        return $this->model
            ->where(column: [
                'type' => $type,
                'record_id' => $recordId,
            ])
            ->firstOrFail()
            ->update(attributes: ['data' => $this->model->getDataAsJson()]);
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): Model
    {
        return $this->model
            ->create(
                attributes: $data
            );
    }
}
