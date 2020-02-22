<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Requirement;
use Faker\Generator as Faker;

$factory->define(Requirement::class, function (Faker $faker) {
    return [
        'name' => 'Req. '.$faker->name,
        'description' => 'Some description',
        'days' => 5
    ];
});
