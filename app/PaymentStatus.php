<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentStatus extends Model
{
    protected $table = 'payment_status';

    protected $fillable = [
        'name'
    ];

    function incomesExpenses(){
        return $this->hasMany('App\IncomeExpense');
    }

    function transactions(){
        return $this->hasMany('App\Transaction');
    }
}
