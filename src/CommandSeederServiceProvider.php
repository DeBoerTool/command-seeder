<?php

namespace Dbt\CommandSeeder;

use Illuminate\Support\ServiceProvider;

class CommandSeederServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/Config/command-seeder.php' => config_path('command-seeder.php'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([SeedCommand::class]);
        }
    }
}
