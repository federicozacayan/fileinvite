<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Process;
use Faker\Generator as Faker;

$factory->define(Process::class, function (Faker $faker) {
    return [
        'customer_id' => 1,
        'requirement_id' => 1,
        'json' => '{}'
    ];
});
