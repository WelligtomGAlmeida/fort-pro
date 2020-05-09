<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'card_type_id',
        'account_id',
        'bank_id',
        'name',
        'invoice_due_date',
        'invoice_closing_date',
        'number'
    ];
}
