<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionAccount extends Model
{
    protected $table = 'transactions_accounts';

    protected $fillable = [
        'account_id',
        'transaction_id'
    ];
}
