<?php

namespace Pellerichard\LaravelDynamicApi\Services;

use Illuminate\Foundation\Http\FormRequest;

abstract class AbstractService
{
    /**
     * @param mixed $formRequest
     * @param FormRequest|array $storeRequest
     *
     * @return void
     */
    public function generalizeRequest(mixed $formRequest, FormRequest|array &$storeRequest): void
    {
       if (! ($storeRequest instanceof $formRequest)) {
           request()->query->add($storeRequest);
           $storeRequest = app()->make($formRequest);
       }
    }
}
