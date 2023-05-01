<?php

namespace Dbt\CommandSeeder\Tests;

/**
 * @covers \Dbt\CommandSeeder\SeedCommand
 */
class SeedCommandMockedTest extends TestCase
{
    const BAD_ARGS = 'The number of arguments (2) does not match the number of given values (0).';

    const BAD_SEEDER = 'Seeder "noSuchSeeder" not found.';

    const SEEDER_FAILED = 'Seeder failed.';

    /** @test */
    public function failing_with_no_such_seeder(): void
    {
        $this->artisan('seed:command', ['seeder' => 'noSuchSeeder', 'quantity' => '1'])
            ->expectsOutput(self::BAD_SEEDER)
            ->assertFailed();
    }

    /** @test */
    public function failing_with_wrong_arg_count(): void
    {
        $this->artisan('seed:command', ['seeder' => 'args', 'quantity' => '1'])
            ->expectsOutput(self::BAD_ARGS)
            ->assertFailed();
    }

    /** @test */
    public function failing_with_thrown_exception(): void
    {
        $this->artisan('seed:command', ['seeder' => 'fail', 'quantity' => '1'])
            ->expectsOutput(self::SEEDER_FAILED)
            ->assertFailed();
    }
}
