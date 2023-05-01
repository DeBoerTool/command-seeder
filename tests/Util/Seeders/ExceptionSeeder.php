<?php

namespace Dbt\CommandSeeder\Tests\Util\Seeders;

use Dbt\CommandSeeder\Arguments\ArgumentNames;
use Dbt\CommandSeeder\Arguments\Arguments;
use Dbt\CommandSeeder\CommandSeederAbstract;
use Exception;

class ExceptionSeeder extends CommandSeederAbstract
{
    public function argumentNames(): ArgumentNames
    {
        return new ArgumentNames();
    }

    /**
     * @throws \Exception
     */
    public function run(Arguments $arguments, int $quantity): void
    {
        throw new Exception('Seeder failed.');
    }
}
