<?php

namespace Dbt\CommandSeeder;

use Dbt\CommandSeeder\Arguments\Arguments;
use Dbt\CommandSeeder\Exceptions\ArgumentMismatchException;
use Exception;
use Illuminate\Console\Command;

class SeedCommand extends Command
{
    /** @var string */
    protected $signature = 'seed:command {seeder} {quantity} {seederArgs?*}';

    /** @var string */
    protected $description = 'Run a CommandSeeder.';

    public function handle(): int
    {
        try {
            $seeder = CommandSeederAbstract::make(
                $this->argument('seeder'),
                $this->laravel,
                $this->getOutput(),
            );
        } catch (Exception $exception) {
            $this->error($exception->getMessage());

            return self::FAILURE;
        }

        try {
            $arguments = new Arguments(
                $seeder->argumentNames(),
                ...$this->argument('seederArgs'),
            );
        } catch (ArgumentMismatchException $exception) {
            $this->error($exception->getMessage());

            return self::FAILURE;
        }

        try {
            $seeder->run($arguments, (int) $this->argument('quantity'));
        } catch (Exception $exception) {
            $this->error($exception->getMessage());

            return self::FAILURE;
        }

        return self::SUCCESS;
    }
}
