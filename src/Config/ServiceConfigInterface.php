<?php

namespace JoelButcher\LaravelServices\Config;

interface ServiceConfigInterface
{
    public function __construct(ServiceConfigItem ...$config);
}
