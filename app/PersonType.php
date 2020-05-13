<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonType extends Model
{
    protected $fillable = [
        'name'
    ];

    function transactionParticipants(){
        return $this->hasMany('App\TransactionParticipant');
    }
}
