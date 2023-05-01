<?php

namespace Dbt\CommandSeeder\Tests;

use Dbt\CommandSeeder\Tests\Util\TestModel;
use Faker\Factory;

/**
 * @covers \Dbt\CommandSeeder\SeedCommand
 * @covers \Dbt\CommandSeeder\CommandSeederServiceProvider
 */
class SeedCommandTest extends TestCase
{
    public $mockConsoleOutput = false;

    /** @test */
    public function seeding_with_no_arguments(): void
    {
        $exit = $this->artisan('seed:command', [
            'seeder' => 'noArgs',
            'quantity' => '1',
        ]);

        $this->assertSame(0, $exit);

        $this->assertTrue(
            TestModel::query()->where('name', 'no arguments')->exists(),
        );
        $this->assertCount(1, TestModel::all());
    }

    /** @test */
    public function seeding_with_arguments(): void
    {
        $faker = Factory::create();

        $name = $faker->name();
        $email = $faker->email();

        $exit = $this->artisan('seed:command', [
            'seeder' => 'args',
            'quantity' => '2',
            'seederArgs' => [$name, $email],
        ]);

        $this->assertSame(0, $exit);

        $models = TestModel::all();
        $this->assertCount(2, $models);
        $models->each(function (TestModel $model) use ($name, $email) {
            $this->assertSame($name, $model->name);
            $this->assertSame($email, $model->email);
        });
    }
}
