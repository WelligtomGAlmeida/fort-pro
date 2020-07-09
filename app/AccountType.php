<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    protected $fillable = [
        'visibility_id',
        'account_category_id',
        'name'
    ];

    function visibility(){
        return $this->belongsTo('App\Visibility');
    }

    function accountCategory(){
        return $this->belongsTo('App\AccountCategory');
    }

    function accounts(){
        return $this->hasMany('App\Account');
    }
}
