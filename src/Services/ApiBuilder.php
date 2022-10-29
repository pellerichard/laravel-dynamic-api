<?php

namespace Pellerichard\LaravelDynamicApi\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Pellerichard\LaravelDynamicApi\Http\Repositories\Contracts\ApiRepositoryInterface;
use Pellerichard\LaravelDynamicApi\Models\DynamicApi;

class ApiBuilder
{
    /**
     * @var array
     */
    private array $where = [];

    /**
     * @var array
     */
    private array $attributes = [];

    /**
     * @var string
     */
    private string $type;

    /**
     * @var bool
     */
    private bool $withPagination = false;

    public function __construct(private readonly ApiRepositoryInterface $apiRepository)
    {

    }

    /**
     * Sets the type column.
     *
     * @param string $type
     *
     * @return $this
     */
    public function whereType(string $type): self
    {
        $this->where['type'] = $type;

        return $this;
    }

    /**
     * Sets the recordId column.
     *
     * @param int $recordId
     *
     * @return $this
     */
    public function whereRecordId(int $recordId): self
    {
        $this->where['recordId'] = $recordId;

        return $this;
    }

    /**
     * Sets the where columns.
     *
     * @param string $type
     * @param int $recordId
     *
     * @return $this
     */
    public function whereColumns(string $type, int $recordId): self
    {
        return $this
            ->whereType($type)
            ->whereRecordId($recordId);
    }

    /**
     * Sets if should paginate.
     *
     * @param bool $withPagination
     *
     * @return $this
     */
    public function withPagination(bool $withPagination): self
    {
        $this->withPagination = $withPagination;

        return $this;
    }

    /**
     * Sets the attributes.
     *
     * @param array $attributes
     *
     * @return $this
     */
    public function setAttributes(array $attributes = []): self
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Sets the table name.
     *
     * @param string $type
     *
     * @return $this
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Returns an entity based on the attributes.
     *
     * @return DynamicApi|Model
     */
    public function first(): DynamicApi|Model
    {
        return $this->apiRepository->findOneByTypeAndRecordId(
            $this->getFilter(),
            type: $this->where['type'] ?? '',
            recordId: $this->where['recordId'] ?? 0,
        );
    }

    /**
     * Fetches multiple entitiess.
     *
     * @return LengthAwarePaginator|EloquentCollection
     */
    public function get(): LengthAwarePaginator|EloquentCollection
    {
        return $this->apiRepository->getAll(
            filter: $this->getFilter()
        );
    }

    /**
     * Deletes an entity.
     *
     * @return bool
     */
    public function delete(): bool
    {
        return $this->apiRepository->destroyByRecordIdAndType(
            recordId: $this->where['recordId'] ?? 0,
            type: $this->where['type'] ?? '',
        );
    }

    /**
     * Updates an entity.
     *
     * @return bool
     */
    public function update(): bool
    {
        return $this->apiRepository->updateByRecordIdAndTypeWithData(
            recordId: $this->where['recordId'] ?? 0,
            type: $this->where['type'] ?? '',
            data: $this->attributes,
        );
    }

    /**
     * Updates an entity.
     *
     * @return Model
     */
    public function create(): Model
    {
        return $this->apiRepository->create(
            data: ['type' => $this->type, 'data' => json_encode(collect($this->attributes))]
        );
    }

    /**
     * Returns the filter statements.
     *
     * @return Collection
     */
    private function getFilter(): Collection
    {
        return collect($this->where + ['withPagination' => $this->withPagination]);
    }
}
