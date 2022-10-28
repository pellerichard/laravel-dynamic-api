<?php

namespace Pellerichard\LaravelDynamicApi\Http\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
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
    public function getAll(Collection $filter): LengthAwarePaginator
    {
        return $this->model
            ->when(
                value: $filter->get('table_name') !== null,
                callback: fn (Builder $query, string $value) => $query->where('table_name', '=', $filter->get('table_name'))
            )
            ->when(
                value: $filter->get('table_id') !== null,
                callback: fn (Builder $query, int $value) => $query->where('table_id', '=', $filter->get('table_id'))
            )
            ->paginate(perPage: $filter->get('per_page'));
    }

    /**
     * @inheritDoc
     */
    public function findOneByTableNameAndTableId(string $tableName, int $tableId): Model
    {
        return $this->model->where(column: [
            'table_name' => $tableName,
            'table_id' => $tableId,
        ])->firstOrFail();
    }

    /**
     * @inheritDoc
     */
    public function destroyByTableIdAndTableNameId(int $tableId, string $tableName): bool
    {
        return $this->model->where(column: [
            'table_name' => $tableName,
            'table_id' => $tableId,
        ])->firstOrFail()->deleteOrFail();
    }

    /**
     * @inheritDoc
     */
    public function updateByTableIdAndTableNameWithData(int $tableId, string $tableName, array $data): bool
    {
        return $this->model->where(column: [
            'table_name' => $tableName,
            'table_id' => $tableId,
        ])->firstOrFail()->update(attributes: $data);
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): Model
    {
        return $this->model->create(
            attributes: $data
        );
    }
}
