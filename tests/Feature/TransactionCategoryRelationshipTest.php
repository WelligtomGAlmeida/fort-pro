<?php

namespace Tests\Feature;

use App\TransactionCategoryRelationship;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransactionCategoryRelationshipTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of a TransactionCategoryRelationship in the database
     */
    function testCreateTransactionCategoryRelationship(){

        $transactionCategoryRelationship = factory(TransactionCategoryRelationship::class)->create();

        $this->assertDatabaseHas('transaction_category_relationship', ['income_expense_id' => $transactionCategoryRelationship->income_expense_id, 'transaction_category_id' => $transactionCategoryRelationship->transaction_category_id]);
    }
}
