<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionCard extends Model
{
    protected $table = 'transactions_cards';

    protected $fillable = [
        'card_id',
        'transaction_id'
    ];
}
