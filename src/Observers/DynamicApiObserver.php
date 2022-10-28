<?php

namespace Pellerichard\LaravelDynamicApi\Observers;

use Pellerichard\LaravelDynamicApi\Models\DynamicApi;

class DynamicApiObserver
{
    public function creating(DynamicApi $dynamicApi): void
    {
        $dynamicApi->table_id = (
            $dynamicApi::where('table_name', '=', $dynamicApi->table_name)->orderBy('table_id', 'DESC')?->value('table_id') + 1
        );
    }
}
