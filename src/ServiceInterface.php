<?php

namespace JoelButcher\LaravelServices;

use JoelButcher\LaravelServices\Config\ServiceConfigInterface;

interface ServiceInterface
{
    /**
     * The unique identifier for the service.
     *
     * {@see config/services.php}
     */
    public static function identifier(): string;

    /**
     * Dynamically create a new service class instance.
     */
    public static function make(): self;

    /**
     * Retrieve the initialised service config.
     */
    public function config(): ServiceConfigInterface;
}
