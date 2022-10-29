# **Laravel Dynamic API**


## Issue
Implementing multiple CRUD's with different table name and columns could take a lot of hours to make.

## Solution
Dynamic API which holds the data within a generic table.

Pros:
- Saves a lot of time
- You can always set new type of data without touching the previous records
- Perfect for Micro sites / Micro services, and for small projects

Cons:
- Relatively slow due to the data saving mechanism.

## Installation

Install the package:

`composer require pellerichard/laravel-dynamic-api`

Publish the config:

`php artisan vendor:publish --provider="Pellerichard\LaravelDynamicApi\DynamicApiServiceProvider"`

Run the migration:

`php artisan migrate`

You should now have a `config/dynamic-api.php` file that allows you to configure the basics of this package.

## Endpoint access:

Default Endpoints:

Retrieve every entities:
> **GET** /api/v1/dynamic-api

Retrieve all entities within a table by table name:
> **GET** /api/v1/dynamic-api?type=currencies

Retrieve specific entity within a table by table name and table id:
> **GET** /api/v1/dynamic-api?type=currencies&record_id=1

Create an entity:
> **POST** /api/v1/dynamic-api?type=currencies&record_id=1&currency=USD&value=100

Update a specific entity by table name and table id:
> **PATCH** /api/v1/dynamic-api?type=people&record_id=1&age=5&height=180cm

## Manual access:

```php
use Pellerichard\LaravelDynamicApi\Services\Facades\ApiService;

// Create an entity.
ApiService::builder()
    ->setType(type: 'human')
    ->setAttributes(attributes: [
        'first_name' => 'Richárd',
        'last_name' => 'Pelle',
        'age' => 23,
        'occupation' => 'Full Stack Developer',
    ])
    ->create();

// Get all entities.
ApiService::builder()
    ->withPagination(withPagination: false)
    ->get();

// Get all entities with specific type.
ApiService::builder()
    ->whereType(type: 'human')
    ->withPagination(withPagination: false)
    ->get();

// Get one specific entity, and return it's data.
ApiService::builder()
    ->whereType(type: 'human')
    ->whereRecordId(recordId: 1)
    ->first();

// Update an entity.
ApiService::builder()
    ->whereType(type: 'human')
    ->whereRecordId(recordId: 1)
    ->setAttributes(attributes: [
        'age' => 24,
        'github_link' => 'https://github.com/pellerichard'
    ])
    ->update();

// Delete an entity.
ApiService::builder()
    ->whereType(type: 'human')
    ->whereRecordId(recordId: 1)
    ->delete();
```
### Available methods on Model
> Method: getDataAsArray
>
Description: Returns the entity's data in array format.
### Customization options

```php
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
```
