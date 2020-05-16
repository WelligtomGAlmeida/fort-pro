<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'income_expense_id' => function(){
            return factory(App\IncomeExpense::class)->create()->id;
        },
        'transaction_movement_id' => function(){
            return factory(App\TransactionMovement::class)->create()->id;
        },
        'payment_status_id' => function(){
            return factory(App\PaymentStatus::class)->create()->id;
        },
        'value' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100000.00),
        'additional_value' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100000.00),
        'installment_number' => $faker->randomDigitNot(0),
        'due_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'effective_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'description' => $faker->text($maxNbChars = 250)
    ];
});
