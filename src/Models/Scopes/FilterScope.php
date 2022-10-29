<?php

namespace Pellerichard\LaravelDynamicApi\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

trait FilterScope
{
    /**
     * @param $query
     * @param Collection $filter
     *
     * @return Builder
     */
    public function scopeStatements($query, Collection $filter): Builder
    {
        return $query->when(
            value: $filter->get('type') !== null,
            callback: fn (Builder $query, string $value) => $query->where('type', '=', $filter->get('type'))
        )->when(
            value: $filter->get('record_id') !== null,
            callback: fn (Builder $query, int $value) => $query->where('record_id', '=', $filter->get('record_id'))
        );
    }
}
