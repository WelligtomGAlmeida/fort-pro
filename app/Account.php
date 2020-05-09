<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'person_id',
        'account_category_id',
        'bank_id',
        'account_type_id',
        'name',
        'agency',
        'number',
        'check_digit'
    ];
}
