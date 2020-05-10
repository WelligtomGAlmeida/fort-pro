<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Loan;
use Faker\Generator as Faker;

$factory->define(Loan::class, function (Faker $faker) {
    return [
        'person_id' => function(){
            return factory(App\Person::class)->create()->id;
        },
        'loan_movement_id' => function(){
            return factory(App\LoanMovement::class)->create()->id;
        },
        'transaction_participant_id' => function(){
            return factory(App\TransactionParticipant::class)->create()->id;
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
        'name' => $faker->numerify('Loan ###'),
        'description' => $faker->text($maxNbChars = 250),
        'credit_value' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100000.00),
        'debit_value' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100000.00),
        'credit_installment' => $faker->randomDigitNot(0),
        'debit_installment' => $faker->randomDigitNot(0),
        'credit_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'debit_date' => $faker->date($format = 'Y-m-d', $max = 'now')
    ];
});
