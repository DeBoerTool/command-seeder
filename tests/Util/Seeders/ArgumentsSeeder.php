<?php

namespace Dbt\CommandSeeder\Tests\Util\Seeders;

use Dbt\CommandSeeder\Arguments\ArgumentNames;
use Dbt\CommandSeeder\Arguments\Arguments;
use Dbt\CommandSeeder\CommandSeederAbstract;
use Dbt\CommandSeeder\Tests\Util\TestModel;

class ArgumentsSeeder extends CommandSeederAbstract
{
    public function argumentNames(): ArgumentNames
    {
        return new ArgumentNames('name', 'email');
    }

    public function run(Arguments $arguments, int $quantity): void
    {
        for ($i = 0; $i < $quantity; $i++) {
            TestModel::query()->create($arguments->all());
        }
    }
}
