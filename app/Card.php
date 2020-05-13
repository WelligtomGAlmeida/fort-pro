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

    function cardType(){
        return $this->belongsTo('App\CardType');
    }

    function account(){
        return $this->belongsTo('App\Account');
    }

    function bank(){
        return $this->belongsTo('App\Bank');
    }
}
