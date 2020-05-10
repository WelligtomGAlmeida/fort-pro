<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Card;
use Faker\Generator as Faker;

$factory->define(Card::class, function (Faker $faker) {
    return [
        'card_type_id' => function(){
            return factory(App\CardType::class)->create()->id;
        },
        'account_id' => function(){
            return factory(App\Account::class)->create()->id;
        },
        'bank_id' => function(){
            return factory(App\Bank::class)->create()->id;
        },
        'name' => $faker->numerify('Card ###'),
        'invoice_due_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'invoice_closing_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'number' => $faker->unique()->numberBetween($min = 1000000000000000, $max = 9999999999999999)
    ];
});
