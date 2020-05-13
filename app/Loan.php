<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'person_id',
        'loan_movement_id',
        'transaction_participant_id',
        'credit_account_id',
        'debit_account_id',
        'income_id',
        'expense_id',
        'name',
        'description',
        'credit_value',
        'debit_value',
        'credit_installment',
        'debit_installment',
        'credit_date',
        'debit_date'
    ];

    function person(){
        return $this->belongsTo('App\Person');
    }

    function loanMovement(){
        return $this->belongsTo('App\LoanMovement');
    }

    function transactionParticipant(){
        return $this->belongsTo('App\TransactionParticipant');
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
