<?php

namespace Dbt\CommandSeeder\Tests;

use Dbt\CommandSeeder\CommandSeederServiceProvider;
use Dbt\CommandSeeder\Tests\Util\Seeders\ArgumentsSeeder;
use Dbt\CommandSeeder\Tests\Util\Seeders\ExceptionSeeder;
use Dbt\CommandSeeder\Tests\Util\Seeders\NoArgumentsSeeder;
use Illuminate\Contracts\Config\Repository;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected array $seeders = [
        'noArgs' => NoArgumentsSeeder::class,
        'args' => ArgumentsSeeder::class,
        'fail' => ExceptionSeeder::class,
    ];

    protected function getPackageProviders($app): array
    {
        return [CommandSeederServiceProvider::class];
    }

    protected function defineEnvironment($app): void
    {
        $this->defineConfig($app->make(Repository::class));
    }

    public function defineConfig(Repository $config): void
    {
        $config->set('command-seeder.seeders', $this->seeders);

        $config->set('database.default', 'sqlite');
        $config->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    protected function defineDatabaseMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/Util/Migrations');
    }
}
