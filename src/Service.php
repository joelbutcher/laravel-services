<?php

namespace JoelButcher\LaravelServices;

use Illuminate\Config\Repository;
use JoelButcher\LaravelServices\Config\ServiceConfig;
use JoelButcher\LaravelServices\Config\ServiceConfigInterface;
use JoelButcher\LaravelServices\Config\ServiceConfigItem;

/**
 * @phpstan-consistent-constructor
 */
abstract class Service implements ServiceInterface
{
    protected ServiceConfigInterface $config;

    public function __construct(Repository $config)
    {
        $identifier = static::identifier();

        $this->config = $this->initialiseConfig($config->get("services.$identifier"));
    }

    /** {@inheritDoc} */
    public static function make(): ServiceInterface
    {
        return new static(app(Repository::class));
    }

    /**
     * Method used to initialise any config required for the service
     */
    protected function initialiseConfig(array $config = []): ServiceConfigInterface
    {
        return new ServiceConfig(...collect($config)->map(fn(mixed $value, string $key) => new ServiceConfigItem($key, $value)));
    }

    /** {@inheritDoc} */
    public function config(): ServiceConfigInterface
    {
        return $this->config;
    }
}
