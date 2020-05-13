<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionCategory extends Model
{
    protected $fillable = [
        'person_id',
        'transaction_movement_id',
        'visibility_id',
        'name'
    ];

    function person(){
        return $this->belongsTo('App\Person');
    }

    function transactionMovement(){
        return $this->belongsTo('App\TransactionMovement');
    }

    function visibility(){
        return $this->belongsTo('App\Visibility');
    }

    function incomesExpenses(){
        return $this->belongsToMany("App\IncomeExpense", "transaction_category_relationship")->withPivot(['created_at', 'updated_at']);
    }
}
