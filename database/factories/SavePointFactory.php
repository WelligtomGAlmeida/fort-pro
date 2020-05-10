<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SavePoint;
use Faker\Generator as Faker;

$factory->define(SavePoint::class, function (Faker $faker) {
    return [
        'save_date' => $faker->date($format = 'Y-m-d', $max = 'now')
    ];
});
