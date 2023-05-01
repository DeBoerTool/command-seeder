<?php

namespace Dbt\CommandSeeder\Config;

use Illuminate\Contracts\Config\Repository;
use InvalidArgumentException;

class CommandSeederConfig
{
    public function __construct(protected readonly Repository $config)
    {
    }

    public function seeders(): array
    {
        return $this->config->get('command-seeder.seeders');
    }

    public function seeder(string $name): string
    {
        return $this->seeders()[$name] ?? throw new InvalidArgumentException(
            sprintf('Seeder "%s" not found.', $name)
        );
    }
}
