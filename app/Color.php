<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = [
        'color'
    ];

    function accounts(){
        return $this->hasMany('App\Account');
    }
}
