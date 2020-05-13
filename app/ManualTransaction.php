<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManualTransaction extends Model
{
    protected $fillable = [
        'person_id',
        'account_id',
        'transaction_movement_id',
        'name',
        'description',
        'value',
        'operation_date'
    ];

    function person(){
        return $this->belongsTo('App\Person');
    }

    function account(){
        return $this->belongsTo('App\Account');
    }

    function transactionMovement(){
        return $this->belongsTo('App\TransactionMovement');
    }

    function transactions(){
        return $this->hasMany('App\Transaction');
    }
}
