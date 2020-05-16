<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'name',
        'birth_date',
        'cpf',
        'cell_phone',
        'email'
    ];

    function accounts(){
        return $this->hasMany('App\Account');
    }

    function incomesExpenses(){
        return $this->hasMany('App\IncomeExpense');
    }

    function loans(){
        return $this->hasMany('App\Loan');
    }

    function transactionCategories(){
        return $this->hasMany('App\TransactionCategory');
    }

    function transactionParticipants(){
        return $this->hasMany('App\TransactionParticipant');
    }
}
