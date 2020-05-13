<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recurrence extends Model
{
    protected $fillable = [
        'name'
    ];

    function incomesExpenses(){
        return $this->hasMany('App\IncomeExpense');
    }
}
