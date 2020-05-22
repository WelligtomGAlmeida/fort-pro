<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TransactionCard;
use Faker\Generator as Faker;

$factory->define(TransactionCard::class, function (Faker $faker) {
    return [
        'transaction_id' => function(){
            return factory(App\Transaction::class)->create()->id;
        },
        'card_id' => function(){
            return factory(App\Card::class)->create()->id;
        }
    ];
});
