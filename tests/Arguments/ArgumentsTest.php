<?php

/** @noinspection PhpUnhandledExceptionInspection */

namespace Dbt\CommandSeeder\Tests\Arguments;

use Dbt\CommandSeeder\Arguments\ArgumentNames;
use Dbt\CommandSeeder\Arguments\Arguments;
use Dbt\CommandSeeder\Exceptions\ArgumentMismatchException;
use Dbt\CommandSeeder\Tests\TestCase;

/**
 * @covers \Dbt\CommandSeeder\Arguments\Arguments
 */
class ArgumentsTest extends TestCase
{
    /** @test */
    public function number_of_arguments_must_match_number_of_names(): void
    {
        $names = new ArgumentNames('foo', 'bar');

        $this->expectException(ArgumentMismatchException::class);

        new Arguments($names, 'baz');
    }

    /** @test */
    public function getting_the_arguments(): void
    {
        $names = new ArgumentNames('foo', 'bar');
        $args = new Arguments($names, 'baz', 'qux');

        $this->assertSame(['foo' => 'baz', 'bar' => 'qux'], $args->all());
        $this->assertSame('baz', $args->get('foo'));
    }
}
