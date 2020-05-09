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
}
