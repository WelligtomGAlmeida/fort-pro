<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionParticipant extends Model
{
    protected $fillable = [
        'person_id',
        'person_type_id',
        'name'
    ];
}
