<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TransactionAccount;
use Faker\Generator as Faker;

$factory->define(TransactionAccount::class, function (Faker $faker) {
    return [
        'transaction_id' => function(){
            return factory(App\Transaction::class)->create()->id;
        },
        'account_id' => function(){
            return factory(App\Account::class)->create()->id;
        }
    ];
});
