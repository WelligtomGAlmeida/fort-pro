<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionParticipant extends Model
{
    protected $fillable = [
        'person_id',
        'person_type_id',
        'name'
    ];

    function person(){
        return $this->belongsTo('App\Person');
    }

    function personType(){
        return $this->belongsTo('App\PersonType');
    }

    function incomesExpenses(){
        return $this->hasMany('App\IncomeExpense');
    }

    function loans(){
        return $this->hasMany('App\Loan');
    }
}
