<?php

namespace Dbt\CommandSeeder\Tests\Arguments;

use Dbt\CommandSeeder\Arguments\ArgumentNames;
use Dbt\CommandSeeder\Tests\TestCase;

/**
 * @covers \Dbt\CommandSeeder\Arguments\ArgumentNames
 */
class ArgumentNamesTest extends TestCase
{
    /** @test */
    public function constructing(): void
    {
        $names = new ArgumentNames('foo', 'bar');

        $this->assertSame(['foo', 'bar'], $names->arguments);
        $this->assertCount(2, $names);
    }
}
