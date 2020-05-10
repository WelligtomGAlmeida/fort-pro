<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TransactionCategoryRelationship;
use Faker\Generator as Faker;

$factory->define(TransactionCategoryRelationship::class, function (Faker $faker) {
    return [
        'income_expense_id' => function(){
            return factory(App\IncomeExpense::class)->create()->id;
        },
        'transaction_category_id' => function(){
            return factory(App\TransactionCategory::class)->create()->id;
        }
    ];
});
