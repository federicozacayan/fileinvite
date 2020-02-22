<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Files;
use Faker\Generator as Faker;

$factory->define(Files::class, function (Faker $faker) {
    return [
        'name' => 'Document.doc',
        'processes_id' => 1,
        'file_types_id' => 1,
        'status' => '//@todo',
    ];
});
