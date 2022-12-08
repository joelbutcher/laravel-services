<?php

namespace JoelButcher\LaravelServices\Config;

use Illuminate\Support\Collection;

final class ServiceConfig extends Collection implements ServiceConfigInterface
{
    public function __construct(ServiceConfigItem ...$config)
    {
        parent::__construct($config);
    }
}
