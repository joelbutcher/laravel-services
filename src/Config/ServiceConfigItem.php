<?php

namespace JoelButcher\LaravelServices\Config;

final class ServiceConfigItem
{
    public function __construct(
        public readonly string $key,
        public readonly mixed $value,
    ) {
        //
    }
}
