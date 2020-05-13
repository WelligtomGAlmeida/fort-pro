<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'name',
        'code'
    ];

    function accounts(){
        return $this->hasMany('App\Account');
    }

    function cards(){
        return $this->hasMany('App\Card');
    }
}
