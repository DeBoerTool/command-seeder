<?php

namespace Dbt\CommandSeeder\Arguments;

use Dbt\CommandSeeder\Exceptions\ArgumentMismatchException;
use InvalidArgumentException;

class Arguments
{
    /** @var string[] */
    public readonly array $values;

    /**
     * @throws \Dbt\CommandSeeder\Exceptions\ArgumentMismatchException
     */
    public function __construct(
        public readonly ArgumentNames $names,
        string ...$values,
    ) {
        ArgumentMismatchException::check($this->names, $values);

        $this->values = $values;
    }

    public function all(): array
    {
        return array_combine($this->names->arguments, $this->values);
    }

    public function get(string $name): string
    {
        return $this->all()[$name] ?? throw new InvalidArgumentException(
            sprintf('Argument "%s" not found.', $name)
        );
    }
}
