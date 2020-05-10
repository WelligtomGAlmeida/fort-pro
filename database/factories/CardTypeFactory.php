<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CardType;
use Faker\Generator as Faker;

$factory->define(CardType::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->numerify('Card Type ###')
    ];
});
