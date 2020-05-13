<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardType extends Model
{
    protected $fillable = [
        'name'
    ];

    function cards(){
        return $this->hasMany('App\Card');
    }
}
