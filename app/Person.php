<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'id',
        'name',
        'birth_date',
        'cpf',
        'cell_phone'
    ];

    function user(){
        return $this->belongsTo('App\Person');
    }

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

    function Transfers(){
        return $this->hasMany('App\Transfer');
    }
}
