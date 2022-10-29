<?php

namespace Pellerichard\LaravelDynamicApi\Http\Requests;

class UpdateRequest extends AbstractFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'record_id' => 'required|integer',
            'type' => 'required|string',
        ];
    }
}
