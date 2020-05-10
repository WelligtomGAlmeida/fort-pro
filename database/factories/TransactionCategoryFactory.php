<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TransactionCategory;
use Faker\Generator as Faker;

$factory->define(TransactionCategory::class, function (Faker $faker) {
    return [
        'person_id' => function(){
            return factory(App\Person::class)->create()->id;
        },
        'transaction_movement_id' => function(){
            return factory(App\TransactionMovement::class)->create()->id;
        },
        'visibility_id' => function(){
            return factory(App\Visibility::class)->create()->id;
        },
        'name' => $faker->numerify('Transaction Category ###')
    ];
});
