<?php

namespace JoelButcher\LaravelServices\Config;

use Illuminate\Support\Enumerable;

interface ServiceConfigInterface extends Enumerable
{
    public function __construct(ServiceConfigItem ...$config);
}
