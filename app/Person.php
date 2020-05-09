<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'name',
        'birth_date',
        'cpf',
        'cell_phone',
        'email'
    ];
}
