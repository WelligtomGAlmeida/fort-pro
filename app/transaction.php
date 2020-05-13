<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'income_expense_id',
        'manual_transaction_id',
        'transaction_movement_id',
        'payment_status_id',
        'value',
        'additional_value',
        'installment_number',
        'due_date',
        'effective_date',
        'description'
    ];

    function incomeExpense(){
        return $this->belongsTo('App\IncomeExpense');
    }

    function manualTransaction(){
        return $this->belongsTo('App\ManualTransaction');
    }

    function transactionMovement(){
        return $this->belongsTo('App\TransactionMovement');
    }

    function paymentStatus(){
        return $this->belongsTo('App\PaymentStatus');
    }
}
