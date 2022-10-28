<?php

namespace Pellerichard\LaravelDynamicApi\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class AbstractFormRequest extends FormRequest
{
    /**
     * @return array
     */
    public function getTableData(): array
    {
        return [
            'table_data' => json_encode(collect($this->query->all())->except(['table_name']))
        ];
    }
}
