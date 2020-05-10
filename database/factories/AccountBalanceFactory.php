<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AccountBalance;
use Faker\Generator as Faker;

$factory->define(AccountBalance::class, function (Faker $faker) {
    return [
        'account_id' => function(){
            return factory(App\Account::class)->create()->id;
        },
        'save_point_id' => function(){
            return factory(App\SavePoint::class)->create()->id;
        },
        'value' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL)
    ];
});
