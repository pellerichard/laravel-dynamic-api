<?php

namespace Pellerichard\LaravelDynamicApi\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class AbstractFormRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'withPagination' => true
        ]);
    }

    /**
     * @return array
     */
    public function getTableData(): array
    {
        return collect($this->query->all())->except(['type', 'record_id'])->toArray();
    }
}
