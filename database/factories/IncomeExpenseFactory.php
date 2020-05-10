<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\IncomeExpense;
use Faker\Generator as Faker;

$factory->define(IncomeExpense::class, function (Faker $faker) {
    return [
        'person_id' => function(){
            return factory(App\Person::class)->create()->id;
        },
        'account_id' => function(){
            return factory(App\Account::class)->create()->id;
        },
        'recurrence_id' => function(){
            return factory(App\Recurrence::class)->create()->id;
        },
        'payment_status_id' => function(){
            return factory(App\PaymentStatus::class)->create()->id;
        },
        'transaction_movement_id' => function(){
            return factory(App\TransactionMovement::class)->create()->id;
        },
        'transaction_participant_id' => function(){
            return factory(App\TransactionParticipant::class)->create()->id;
        },
        'name' => $faker->numerify('Income Expense ###'),
        'description' => $faker->text($maxNbChars = 250),
        'value' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100000.00),
        'installments' => $faker->randomDigitNot(0),
        'operation_date' => $faker->date($format = 'Y-m-d', $max = 'now')
    ];
});
