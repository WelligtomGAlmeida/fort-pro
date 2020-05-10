<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ManualTransaction;
use Faker\Generator as Faker;

$factory->define(ManualTransaction::class, function (Faker $faker) {
    return [
        'person_id' => function(){
            return factory(App\Person::class)->create()->id;
        },
        'account_id' => function(){
            return factory(App\Account::class)->create()->id;
        },
        'transaction_movement_id' => function(){
            return factory(App\TransactionMovement::class)->create()->id;
        },
        'name' => $faker->numerify('Manual Transaction ###'),
        'description' => $faker->text($maxNbChars = 250),
        'value' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100000.00),
        'operation_date' => $faker->date($format = 'Y-m-d', $max = 'now')
    ];
});
