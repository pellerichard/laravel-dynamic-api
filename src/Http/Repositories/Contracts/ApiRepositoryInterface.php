<?php

namespace Pellerichard\LaravelDynamicApi\Http\Repositories\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface ApiRepositoryInterface
{
    /**
     * Returns every entity from the database.
     *
     * @param Collection $filter
     *
     * @return LengthAwarePaginator
     */
    public function getAll(Collection $filter): LengthAwarePaginator;

    /**
     * Returns a specific entity from the database.
     *
     * @param string $tableName
     * @param int $tableId
     *
     * @return Model
     */
    public function findOneByTableNameAndTableId(string $tableName, int $tableId): Model;

    /**
     * Destroys a specific entity from the database.
     *
     * @param int $tableId
     * @param string $tableName
     *
     * @return bool
     */
    public function destroyByTableIdAndTableNameId(int $tableId, string $tableName): bool;

    /**
     * Updates a specific entity in the database.
     *
     * @param int $tableId
     * @param string $tableName
     * @param array $data
     *
     * @return bool
     */
    public function updateByTableIdAndTableNameWithData(int $tableId, string $tableName, array $data): bool;

    /**
     * Creates an entity in the database.
     *
     * @param array $data
     *
     * @return Model
     */
    public function create(array $data): Model;
}
