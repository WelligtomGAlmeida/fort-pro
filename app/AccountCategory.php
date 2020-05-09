<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountCategory extends Model
{
    protected $fillable = [
        'visibility_id',
        'name'
    ];
}
