<?php

namespace Pellerichard\LaravelDynamicApi\Http\Resources;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * @mixin LengthAwarePaginator
 */
trait Paginateable
{
    /**
     * @return array
     */
    public function paginateable(): array
    {
        return [
            'total' => $this->total(),
            'per_page' => $this->perPage(),
            'current_page' => $this->currentPage(),
            'last_page' => $this->lastPage(),
            'next_page_url' => $this->nextPageUrl(),
            'prev_page_url' => $this->previousPageUrl(),
            'from' => $this->firstItem(),
            'to' => $this->lastItem(),
        ];
    }
}
