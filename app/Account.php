<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'person_id',
        'account_category_id',
        'bank_id',
        'account_type_id',
        'name',
        'agency',
        'number',
        'check_digit'
    ];

    function person(){
        return $this->belongsTo('App\Person');
    }

    function accountCategory(){
        return $this->belongsTo('App\AccountCategory');
    }

    function bank(){
        return $this->belongsTo('App\Bank');
    }

    function accountType(){
        return $this->belongsTo('App\AccountType');
    }

    function accountBalances(){
        return $this->hasMany('App\AccountBalance');
    }

    function creditedLoans(){
        return $this->hasMany('App\Loan', 'credit_account_id', 'id');
    }

    function debitedLoans(){
        return $this->hasMany('App\Loan', 'debit_account_id', 'id');
    }

    function incomingTransfers(){
        return $this->hasMany('App\Transfer', 'credit_account_id', 'id');
    }

    function outgoingTransfers(){
        return $this->hasMany('App\Transfer', 'debit_account_id', 'id');
    }

    function cards(){
        return $this->hasMany('App\Card');
    }

    function transactions(){
        return $this->belongsToMany("App\Transaction", "transactions_accounts")->withPivot(['created_at', 'updated_at']);
    }
}
