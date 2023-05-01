<?php

namespace Dbt\CommandSeeder\Tests\Util\Seeders;

use Dbt\CommandSeeder\Arguments\ArgumentNames;
use Dbt\CommandSeeder\Arguments\Arguments;
use Dbt\CommandSeeder\CommandSeederAbstract;
use Dbt\CommandSeeder\Tests\Util\TestModel;

class NoArgumentsSeeder extends CommandSeederAbstract
{
    public function argumentNames(): ArgumentNames
    {
        return new ArgumentNames();
    }

    public function run(Arguments $arguments, int $quantity): void
    {
        TestModel::query()->create([
            'name' => 'no arguments',
            'email' => 'foo@bar.test',
        ]);
    }
}
