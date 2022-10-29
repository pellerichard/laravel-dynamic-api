<?php

namespace Pellerichard\LaravelDynamicApi\Observers;

use Pellerichard\LaravelDynamicApi\Models\DynamicApi;

class DynamicApiObserver
{
    public function creating(DynamicApi $dynamicApi): void
    {
        $dynamicApi->record_id = (
            $dynamicApi::where('type', '=', $dynamicApi->type)->orderBy('record_id', 'DESC')?->value('record_id') + 1
        );
    }
}
