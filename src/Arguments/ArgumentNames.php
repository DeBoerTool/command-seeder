<?php

namespace Dbt\CommandSeeder\Arguments;

use Countable;

class ArgumentNames implements Countable
{
    /** @var string[] */
    public readonly array $arguments;

    public function __construct(string ...$arguments)
    {
        $this->arguments = $arguments;
    }

    public function count(): int
    {
        return count($this->arguments);
    }
}
