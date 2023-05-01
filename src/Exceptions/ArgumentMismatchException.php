<?php

namespace Dbt\CommandSeeder\Exceptions;

use Dbt\CommandSeeder\Arguments\ArgumentNames;
use Exception;

class ArgumentMismatchException extends Exception
{
    /**
     * @throws \Dbt\CommandSeeder\Exceptions\ArgumentMismatchException
     */
    public static function check(ArgumentNames $names, array $values): void
    {
        if (count($names) !== count($values)) {
            throw self::of($names, $values);
        }
    }

    public static function of(ArgumentNames $names, array $values): self
    {
        return new self(
            sprintf(
                'The number of arguments (%s) does not match the number of given values (%s).',
                count($names),
                count($values),
            ),
        );
    }
}
