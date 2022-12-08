<?php

namespace JoelButcher\LaravelServices;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use JoelButcher\LaravelServices\Console\ServiceMakeCommand;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ServiceMakeCommand::class
            ]);
        }
    }

    /** {@inheritDoc} */
    public function register()
    {
        //
    }
}
