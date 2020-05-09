<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncomeExpense extends Model
{
    protected $table = 'incomes_expenses';

    protected $fillable = [
        'person_id',
        'account_id',
        'recurrence_id',
        'payment_status_id',
        'transaction_movement_id',
        'transaction_participant_id',
        'name',
        'description',
        'value',
        'installments',
        'operation_date'
    ];
}
