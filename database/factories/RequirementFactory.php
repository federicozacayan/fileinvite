<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Requirement;
use Faker\Generator as Faker;

$factory->define(Requirement::class, function (Faker $faker) {
    return [
        'name' => 'Driver Licence Adquisition - '.rand(),
        'description' => 'With this process we can iniciate tthe colecting files for Driver Licence adquisition.',
        'days' => 5
    ];
});
