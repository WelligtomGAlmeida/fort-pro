<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Visibility;
use Faker\Generator as Faker;

$factory->define(Visibility::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->numerify('Visibility ###')
    ];
});
