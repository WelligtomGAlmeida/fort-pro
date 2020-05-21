<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionCategoryTransaction extends Model
{
    protected $table = 'transaction_categories_transactions';

    protected $fillable = [
        'income_expense_id',
        'transaction_category_id'
    ];
}
