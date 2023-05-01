<?php

namespace Dbt\CommandSeeder\Tests\Exceptions;

use Dbt\CommandSeeder\Arguments\ArgumentNames;
use Dbt\CommandSeeder\Exceptions\ArgumentMismatchException;
use Dbt\CommandSeeder\Tests\TestCase;

/**
 * @covers \Dbt\CommandSeeder\Exceptions\ArgumentMismatchException
 */
class ArgumentMismatchExceptionTest extends TestCase
{
    const MESSAGE = 'The number of arguments (3) does not match the number of given values (2).';

    /** @test */
    public function checking(): void
    {
        $names = new ArgumentNames('name', 'age', 'gender');
        $values = ['John Doe', 30];

        $this->expectException(ArgumentMismatchException::class);
        $this->expectExceptionMessage(self::MESSAGE);

        ArgumentMismatchException::check($names, $values);
    }

    /** @test */
    public function static_constructor_of(): void
    {
        $names = new ArgumentNames('name', 'age', 'gender');
        $values = ['John Doe', 30];

        $exception = ArgumentMismatchException::of($names, $values);

        $this->assertInstanceOf(ArgumentMismatchException::class, $exception);
        $this->assertSame(self::MESSAGE, $exception->getMessage());
    }
}
