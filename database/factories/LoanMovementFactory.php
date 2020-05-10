<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LoanMovement;
use Faker\Generator as Faker;

$factory->define(LoanMovement::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->numerify('Loan Movement ###')
    ];
});
