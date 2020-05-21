<?php

namespace Tests\Feature;

use App\TransactionCategoryTransaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransactionCategoryTransactionTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of a TransactionCategoryTransaction in the database
     */
    function testCreateTransactionCategoryTransaction(){

        $transactionCategoryTransaction = factory(TransactionCategoryTransaction ::class)->create();

        $this->assertDatabaseHas('transaction_categories_transactions', ['income_expense_id' => $transactionCategoryTransaction->income_expense_id, 'transaction_category_id' => $transactionCategoryTransaction->transaction_category_id]);
    }
}
