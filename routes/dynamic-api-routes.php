<?php

use Illuminate\Support\Facades\Route;
use Pellerichard\LaravelDynamicApi\Http\Controllers\ApiController;
use Pellerichard\LaravelDynamicApi\Http\Controllers\ManualApiController;

Route::controller(ApiController::class)
    ->group(callback: function () {
        Route::get('/', 'index')->name('dynamic_api_index');
        Route::post('/', 'store')->name('dynamic_api_store');
        Route::patch('/', 'update')->name('dynamic_api_update');
        Route::delete('/', 'destroy')->name('dynamic_api_delete');
    });

Route::controller(ManualApiController::class)
    ->group(callback: function () {
        Route::get('/test', 'index')->name('manual_dynamic_api_index');
    });
