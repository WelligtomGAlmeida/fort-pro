<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visibility extends Model
{
    protected $fillable = [
        'name'
    ];

    function accountCategories(){
        return $this->hasMany('App\AccountCategory');
    }

    function accountTypes(){
        return $this->hasMany('App\AccountType');
    }

    function transactionCategories(){
        return $this->hasMany('App\TransactionCategory');
    }
}
