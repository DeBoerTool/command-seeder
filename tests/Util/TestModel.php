<?php

namespace Dbt\CommandSeeder\Tests\Util;

use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    protected $table = 'testing';

    protected $guarded = [];
}
