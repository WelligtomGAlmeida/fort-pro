<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManualTransaction extends Model
{
    protected $fillable = [
        'person_id',
        'account_id',
        'transaction_movement_id',
        'name',
        'description',
        'value',
        'operation_date'
    ];
}
