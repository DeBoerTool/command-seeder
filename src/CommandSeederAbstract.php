<?php

namespace Dbt\CommandSeeder;

use Dbt\CommandSeeder\Arguments\ArgumentNames;
use Dbt\CommandSeeder\Arguments\Arguments;
use Dbt\CommandSeeder\Config\CommandSeederConfig;
use Illuminate\Console\OutputStyle;
use Illuminate\Contracts\Foundation\Application;

abstract class CommandSeederAbstract
{
    public function __construct(
        protected readonly OutputStyle $output,
        protected readonly Application $app,
    ) {
    }

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public static function make(
        string $name,
        Application $app,
        OutputStyle $output,
    ): static {
        /** @var \Dbt\CommandSeeder\CommandSeederAbstract $fqcn */
        $fqcn = $app->make(CommandSeederConfig::class)->seeder($name);

        return new $fqcn($output, $app);
    }

    abstract public function argumentNames(): ArgumentNames;

    abstract public function run(
        Arguments $arguments,
        int $quantity,
    ): void;
}
