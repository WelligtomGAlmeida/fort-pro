<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountCategory extends Model
{
    protected $fillable = [
        'visibility_id',
        'name'
    ];

    function visibility(){
        return $this->belongsTo('App\Visibility');
    }

    function accounts(){
        return $this->hasMany('App\Account');
    }
}
