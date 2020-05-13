<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanMovement extends Model
{
    protected $fillable = [
        'name'
    ];

    function loans(){
        return $this->hasMany('App\Loan');
    }
}
