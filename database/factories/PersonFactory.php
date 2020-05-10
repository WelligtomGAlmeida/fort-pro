<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'birth_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'cpf' => $faker->unique()->numberBetween($min = 10000000000, $max = 99999999999),
        'cell_phone' => $faker->numberBetween($min = 10, $max = 99) . $faker->numberBetween($min = 990000000, $max = 999999999),
        'email' => $faker->unique()->safeEmail
    ];
});
