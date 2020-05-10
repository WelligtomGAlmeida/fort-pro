<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AccountType;
use Faker\Generator as Faker;

$factory->define(AccountType::class, function (Faker $faker) {
    return [
        'visibility_id' => function(){
            return factory(App\Visibility::class)->create()->id;
        },
        'name' => $faker->unique()->numerify('Account Type ###')
    ];
});
