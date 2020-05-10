<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Recurrence;
use Faker\Generator as Faker;

$factory->define(Recurrence::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->numerify('Recurrence ###')
    ];
});
