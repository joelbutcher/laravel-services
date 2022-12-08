# Laravel Services

This package provide an intelligent and easy-to-use method for creating and defining Service Layer classes in your application.

<a href="https://packagist.org/packages/joelbutcher/laravel-services">
    <img src="https://img.shields.io/packagist/dt/joelbutcher/laravel-services" alt="Total Downloads">
</a>
<a href="https://packagist.org/packages/joelbutcher/laravel-services">
    <img src="https://img.shields.io/packagist/v/joelbutcher/laravel-services" alt="Latest Stable Version">
</a>
<a href="https://packagist.org/packages/joelbutcher/laravel-services">
    <img src="https://img.shields.io/packagist/l/joelbutcher/php-optional" alt="License">
</a>

## Install

Require the package via `composer`.

```shell
composer require joelbutcher/laravel-services
```

Laravel-Services comes with package discovery and Laravel will register the service provider automatically.
However, if you wish to explicitly register the service manually, you may do so by adding it to you `config/app.php` file.

```php
'providers' => [
    // ...
    \JoelButcher\LaravelServices\ServiceProvider::class,
],
```

## Usage

To create a new service class for your application you may call the `make:service` artisan command:

```shell
php artisan make:service FooService
```

This will generate a new `FooService.php` file inside the `Services` folder of your projects root namespace directory.

### Identifier
Service classes require an identifier value. This value is used to determine the config values to fetch from Laravel's services config repository (`config/services.php`).

You may specify the identifier when running `make:service` by appending `--idenfifier=<your-service-identifier>` to the end.
If not provided, the package will attempt to derive the identifier from the provided service name by using the `snake_case` version of the name in lower case:

| Name      | Resolved   |
|-----------|------------|
| Foo       | foo        |
| FooBar    | foo_bar    |
| MyService | my_service |
