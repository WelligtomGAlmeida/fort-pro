<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionCategory extends Model
{
    protected $fillable = [
        'person_id',
        'transaction_movement_id',
        'visibility_id',
        'name'
    ];
}
