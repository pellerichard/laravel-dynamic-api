<?php

namespace Pellerichard\LaravelDynamicApi\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Pellerichard\LaravelDynamicApi\Models\Scopes\FilterScope;

/**
 * @property int $id
 * @property int $record_id
 * @property string $type
 * @property string $data
 *
 * @method statements($filter)
 *
 * @package Pellerichard\LaravelDynamicApi\Models
 * @mixin Builder
 */
class DynamicApi extends Model
{
    use HasFactory, SoftDeletes, FilterScope;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'record_id',
        'type',
        'data',
    ];

    /**
     * @return string
     */
    public function getDataAsJson(): string
    {
        return json_encode($this->data);
    }

    /**
     * @return array
     */
    public function getDataAsArray(): array
    {
        return json_decode($this->data, true);
    }

    /**
     * @param array $array
     * @return array
     */
    public function mergeDataWithArray(array $array): array
    {
        return array_merge($this->getDataAsArray(), $array);
    }
}
