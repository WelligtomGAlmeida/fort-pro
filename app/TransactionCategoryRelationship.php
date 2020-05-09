<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionCategoryRelationship extends Model
{
    protected $table = 'transaction_category_relationship';

    protected $fillable = [
        'income_expense_id',
        'transaction_category_id'
    ];
}
