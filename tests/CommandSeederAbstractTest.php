<?php

namespace Dbt\CommandSeeder\Tests;

use Dbt\CommandSeeder\CommandSeederAbstract;
use Dbt\CommandSeeder\Tests\Util\Seeders\NoArgumentsSeeder;
use Illuminate\Console\OutputStyle;
use Mockery;

/**
 * @covers \Dbt\CommandSeeder\CommandSeederAbstract
 */
class CommandSeederAbstractTest extends TestCase
{
    /** @test */
    public function making_a_seeder(): void
    {
        $seeder = CommandSeederAbstract::make(
            'noArgs',
            $this->app,
            Mockery::mock(OutputStyle::class),
        );

        $this->assertInstanceOf(NoArgumentsSeeder::class, $seeder);
    }
}
