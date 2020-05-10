<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Account;
use Faker\Generator as Faker;

$factory->define(Account::class, function (Faker $faker) {
    return [
        'person_id' => function(){
            return factory(App\Person::class)->create()->id;
        },
        'account_category_id' => function(){
            return factory(App\AccountCategory::class)->create()->id;
        },
        'bank_id' => function(){
            return factory(App\Bank::class)->create()->id;
        },
        'account_type_id' => function(){
            return factory(App\AccountType::class)->create()->id;
        },
        'name' => $faker->numerify('Account ###'),
        'agency' => $faker->unique()->numberBetween($min = 1000000000, $max = 9999999999),
        'number' => $faker->unique()->numberBetween($min = 100000000000, $max = 999999999999),
        'check_digit' => $faker->unique()->numberBetween($min = 10000, $max = 99999)
    ];
});
