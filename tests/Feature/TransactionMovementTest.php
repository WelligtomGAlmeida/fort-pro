<?php

namespace Tests\Feature;

use App\IncomeExpense;
use App\ManualTransaction;
use App\Transaction;
use App\TransactionCategory;
use App\TransactionMovement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransactionMovementTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of a TransactionMovement in the database
     */
    function testCreateTransactionMovement(){

        $transactionMovement = factory(TransactionMovement::class)->create();

        $this->assertDatabaseHas('transaction_movements', ['id' => $transactionMovement->id]);
    }

    /*
     * Testing Relationship between TransactionMovement and IncomeExpense
     * TransactionMovement has many Incomes and Expenses
     */
    function testRelationshipTransactionMovementIncomeExpense(){

        $incomeExpense = factory(IncomeExpense::class)->create();

        $transactionMovement = TransactionMovement::find($incomeExpense->transaction_movement_id);
        $incomeExpense = IncomeExpense::find($incomeExpense->id);

        $this->assertTrue($transactionMovement->incomesExpenses->first() == $incomeExpense);
    }

    /*
     * Testing Relationship between TransactionMovement and ManualTransaction
     * TransactionMovement has many ManualTransactions
     */
    function testRelationshipTransactionMovementManualTransaction(){

        $manualTransaction = factory(ManualTransaction::class)->create();

        $transactionMovement = TransactionMovement::find($manualTransaction->transaction_movement_id);
        $manualTransaction = ManualTransaction::find($manualTransaction->id);

        $this->assertTrue($transactionMovement->manualTransactions->first() == $manualTransaction);
    }

    /*
     * Testing Relationship between TransactionMovement and TransactionCategory
     * TransactionMovement has many TransactionCategories
     */
    function testRelationshipTransactionMovementTransactionCategory(){

        $transactionCategory = factory(TransactionCategory::class)->create();

        $transactionMovement = TransactionMovement::find($transactionCategory->transaction_movement_id);
        $transactionCategory = TransactionCategory::find($transactionCategory->id);

        $this->assertTrue($transactionMovement->transactionCategories->first() == $transactionCategory);
    }

    /*
     * Testing Relationship between TransactionMovement and Transaction
     * TransactionMovement has many Transactions
     */
    function testRelationshipTransactionMovementTransaction(){

        $transaction = factory(Transaction::class)->create();

        $transactionMovement = TransactionMovement::find($transaction->transaction_movement_id);
        $transaction = Transaction::find($transaction->id);

        $this->assertTrue($transactionMovement->transactions->first() == $transaction);
    }
}
