<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountBalance extends Model
{
    protected $fillable = [
        'account_id',
        'save_point_id',
        'value'
    ];
}
