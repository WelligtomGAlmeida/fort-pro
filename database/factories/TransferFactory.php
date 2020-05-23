<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transfer;
use Faker\Generator as Faker;

$factory->define(Transfer::class, function (Faker $faker) {
    return [
        'person_id' => function(){
            return factory(App\Person::class)->create()->id;
        },
        'credit_account_id' => function(){
            return factory(App\Account::class)->create()->id;
        },
        'debit_account_id' => function(){
            return factory(App\Account::class)->create()->id;
        },
        'income_id' => function(){
            return factory(App\IncomeExpense::class)->create()->id;
        },
        'expense_id' => function(){
            return factory(App\IncomeExpense::class)->create()->id;
        },
        'name' => $faker->numerify('Transfer ###'),
        'description' => $faker->text($maxNbChars = 250),
        'value' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100000.00),
        'operation_date' => $faker->date($format = 'Y-m-d', $max = 'now')
    ];
});
