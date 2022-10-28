<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Create Endpoints
    |--------------------------------------------------------------------------
    |
    | If you wish to create the default endpoints set this value to true.
    |
    */

    'endpoints' => true,

    /*
    |--------------------------------------------------------------------------
    | Endpoint Rules
    |--------------------------------------------------------------------------
    |
    | Endpoints must be allowed in order for this functionality to take event.
    | Prefix (Route prefix for instance: 'api/v1/dynamic-api/')
    | Middleware (Route middleware which must pass in order to reach the endpoints, common example: ['api', 'web'])
    |
    */

    'endpoint_rules' => [
        'prefix' => 'api/v1/dynamic-api/',
        'middleware' => [],
    ],
];
