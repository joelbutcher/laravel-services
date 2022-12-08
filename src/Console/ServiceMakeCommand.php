<?php

namespace JoelButcher\LaravelServices\Console;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class ServiceMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /** {@inheritDoc} */
    protected function buildClass($name): string
    {
        return $this->replaceIdentifier(parent::buildClass($name));
    }

    /**
     * Replace the identifier for the given stub.
     *
     * @param  string  $stub
     * @return string
     */
    protected function replaceIdentifier(string $stub): string
    {
        $identifier = $this->getIdentifierInput()
            ?: Str::of($this->getNameInput())
                ->snake()
                ->lower()
                ->toString();

        return str_replace(['DummyIdentifier', '{{ identifier }}', '{{identifier}}'], $identifier, $stub);
    }

    /**
     * Get the desired identifier from the input.
     *
     * @return string
     */
    protected function getIdentifierInput(): string
    {
        return trim($this->option('identifier'));
    }

    /** {@inheritDoc} */
    protected function getStub(): string
    {
        return __DIR__ . '/stubs/service.php.stub';
    }

    /** {@inheritDoc} */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Services';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            ['identifier', 'i', InputOption::VALUE_OPTIONAL, 'The unique service identifier'],
        ];
    }
}
