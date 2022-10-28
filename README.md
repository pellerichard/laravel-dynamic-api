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

You should now have a `config/dynamic-api.php` file that allows you to configure the basics of this package.

## Endpoint access:

Default Endpoints:

Retrieve every entities:
> **GET** /api/v1/dynamic-api

Retrieve all entities within a table by table name:
> **GET** /api/v1/dynamic-api?table_name=currencies

Retrieve specific entity within a table by table name and table id:
> **GET** /api/v1/dynamic-api?table_name=currencies&table_id=1

Create an entity:
> **POST** /api/v1/dynamic-api?table_name=currencies&table_id=1&currency=USD&value=100

Update a specific entity by table name and table id:
> **PATCH** /api/v1/dynamic-api?table_name=people&table_id=1&age=5&height=180cm

## Manual access:

```php
// Retrieve every entity.
ApiService::index([]);

// Retrieve a specific entity.
ApiService::index([
    'table_name' => 'my_table_name',
    'table_id' => 1
]);

// Create an entity.
ApiService::store([
    'table_name' => 'my_table_name',
    'table_id' => 1,
    'my_amazing_column' => 'Hello World!',
    'my_favourite_song' => 'nyancat',
    'test' => true
]);

// Update a specific entity.
ApiService::update([
    'table_name' => 'my_table_name',
    'table_id' => 1,
    'first_column' => 'Lorem Ipsum',
    'second_column' => 'Dolor Sit',
    'third_column' => 'Amet'
]);

// Delete a specific entity.
ApiService::destroy([
    'table_name' => 'my_table_name',
    'table_id' => 1
]);
```
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
