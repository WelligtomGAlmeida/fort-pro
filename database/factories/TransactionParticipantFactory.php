<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TransactionParticipant;
use Faker\Generator as Faker;

$factory->define(TransactionParticipant::class, function (Faker $faker) {
    return [
        'person_id' => function(){
            return factory(App\Person::class)->create()->id;
        },
        'person_type_id' => function(){
            return factory(App\PersonType::class)->create()->id;
        },
        'name' => $faker->numerify('Transaction Participant ###')
    ];
});
