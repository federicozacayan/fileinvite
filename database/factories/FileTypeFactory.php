<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FileType;
use Faker\Generator as Faker;

$factory->define(FileType::class, function (Faker $faker) {
    return [
        'name' => ' ID:'.rand(),
        'description' => $faker->name,
        'requirement_id' => '1'
    ];
});
