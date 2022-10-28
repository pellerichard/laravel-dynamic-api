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
