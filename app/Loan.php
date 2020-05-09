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
}
