<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = [
        'name'
    ];

    function transactions(){
        return $this->hasMany('App\Transaction');
    }
}
