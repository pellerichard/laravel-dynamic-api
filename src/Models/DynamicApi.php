<?php

namespace Pellerichard\LaravelDynamicApi\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $table_id
 * @property string $table_name
 * @property string $table_data
 *
 * @package Pellerichard\LaravelDynamicApi\Models
 * @mixin Builder
 */
class DynamicApi extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'table_id',
        'table_name',
        'table_data',
    ];
}
