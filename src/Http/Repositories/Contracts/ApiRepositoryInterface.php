<?php

namespace Pellerichard\LaravelDynamicApi\Http\Repositories\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface ApiRepositoryInterface
{
    /**
     * Returns every entity from the database.
     *
     * @param Collection $filter
     *
     * @return LengthAwarePaginator|Collection
     */
    public function getAll(Collection $filter): LengthAwarePaginator|Collection;

    /**
     * Returns a specific entity from the database.
     *
     * @param Collection $filter
     * @param string $type
     * @param int $recordId
     *
     * @return Model
     */
    public function findOneByTypeAndRecordId(Collection $filter, string $type, int $recordId): Model;

    /**
     * Destroys a specific entity from the database.
     *
     * @param int $recordId
     * @param string $type
     *
     * @return bool
     */
    public function destroyByRecordIdAndType(int $recordId, string $type): bool;

    /**
     * Updates a specific entity in the database.
     *
     * @param int $recordId
     * @param string $type
     * @param array $data
     *
     * @return bool
     */
    public function updateByRecordIdAndTypeWithData(int $recordId, string $type, array $data): bool;

    /**
     * Creates an entity in the database.
     *
     * @param array $data
     *
     * @return Model
     */
    public function create(array $data): Model;
}
