<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AccountCategory;
use Faker\Generator as Faker;

$factory->define(AccountCategory::class, function (Faker $faker) {
    return [
        'visibility_id' => function(){
            return factory(App\Visibility::class)->create()->id;
        },
        'name' => $faker->unique()->numerify('Account Type ###')
    ];
});
