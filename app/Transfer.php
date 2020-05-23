<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = [
        'person_id',
        'credit_account_id',
        'debit_account_id',
        'income_id',
        'expense_id',
        'name',
        'description',
        'value',
        'operation_date',
    ];

    function person(){
        return $this->belongsTo('App\Person');
    }

    function creditAccount(){
        return $this->belongsTo('App\Account', 'credit_account_id', 'id');
    }

    function debitAccount(){
        return $this->belongsTo('App\Account', 'debit_account_id', 'id');
    }

    function income(){
        return $this->belongsTo('App\IncomeExpense', 'income_id', 'id');
    }

    function expense(){
        return $this->belongsTo('App\IncomeExpense', 'expense_id', 'id');
    }
}
