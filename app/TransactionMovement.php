<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionMovement extends Model
{
    protected $fillable = [
        'name'
    ];

    function incomesExpenses(){
        return $this->hasMany('App\IncomeExpense');
    }

    function manualTransactions(){
        return $this->hasMany('App\ManualTransaction');
    }

    function transactionCategories(){
        return $this->hasMany('App\TransactionCategory');
    }

    function transactions(){
        return $this->hasMany('App\Transaction');
    }
}
