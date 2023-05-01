<?php

namespace Dbt\CommandSeeder\Tests\Config;

use Dbt\CommandSeeder\Config\CommandSeederConfig;
use Dbt\CommandSeeder\Tests\TestCase;
use Dbt\CommandSeeder\Tests\Util\Seeders\NoArgumentsSeeder;

/**
 * @covers \Dbt\CommandSeeder\Config\CommandSeederConfig
 */
class CommandSeederConfigTest extends TestCase
{
    /** @test */
    public function getting_the_seeders(): void
    {
        $config = resolve(CommandSeederConfig::class);

        $this->assertCount(count($this->seeders), $config->seeders());
        $this->assertSame(NoArgumentsSeeder::class, $config->seeder('noArgs'));
    }
}
