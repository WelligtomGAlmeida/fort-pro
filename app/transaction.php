<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'income_expense_id',
        'transaction_movement_id',
        'payment_status_id',
        'payment_method_id',
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

    function transactionMovement(){
        return $this->belongsTo('App\TransactionMovement');
    }

    function paymentStatus(){
        return $this->belongsTo('App\PaymentStatus');
    }

    function paymentMethod(){
        return $this->belongsTo('App\PaymentMethod');
    }

    function cards(){
        return $this->belongsToMany("App\Card", "transactions_cards")->withPivot(['created_at', 'updated_at']);
    }

    function accounts(){
        return $this->belongsToMany("App\Account", "transactions_accounts")->withPivot(['created_at', 'updated_at']);
    }
}
