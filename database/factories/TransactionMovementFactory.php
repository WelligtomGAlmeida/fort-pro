<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TransactionMovement;
use Faker\Generator as Faker;

$factory->define(TransactionMovement::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->numerify('Transaction Movement ###')
    ];
});
