<?php

namespace Tests\Feature;

use App\IncomeExpense;
use App\ManualTransaction;
use App\PaymentStatus;
use App\Transaction;
use App\TransactionMovement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of a Transaction in the database
     */
    function testCreateTransaction(){

        $transaction = factory(Transaction::class)->create();

        $this->assertDatabaseHas('transactions', ['id' => $transaction->id]);
    }

    /*
     * Testing Relationship between Transaction and IncomeExpense
     * Transactions belongs to IncomeExpense
     */
    function testRelationshipTransactionIncomeExpense(){

        $transaction = factory(Transaction::class)->create();

        $transaction = Transaction::find($transaction->id);
        $incomeExpense = IncomeExpense::find($transaction->income_expense_id);

        $this->assertTrue($transaction->incomeExpense == $incomeExpense);
    }

    /*
     * Testing Relationship between Transaction and ManualTransaction
     * Transactions belongs to ManualTransaction
     */
    function testRelationshipTransactionManualTransaction(){

        $transaction = factory(Transaction::class)->create();

        $transaction = Transaction::find($transaction->id);
        $manualTransaction = ManualTransaction::find($transaction->manual_transaction_id);

        $this->assertTrue($transaction->manualTransaction == $manualTransaction);
    }

    /*
     * Testing Relationship between Transaction and TransactionMovement
     * Transactions belongs to TransactionMovement
     */
    function testRelationshipTransactionTransactionMovement(){

        $transaction = factory(Transaction::class)->create();

        $transaction = Transaction::find($transaction->id);
        $transactionMovement = TransactionMovement::find($transaction->transaction_movement_id);

        $this->assertTrue($transaction->transactionMovement == $transactionMovement);
    }

    /*
     * Testing Relationship between Transaction and PaymentStatus
     * Transactions belongs to PaymentStatus
     */
    function testRelationshipTransactionPaymentStatus(){

        $transaction = factory(Transaction::class)->create();

        $transaction = Transaction::find($transaction->id);
        $paymentStatus = PaymentStatus::find($transaction->payment_status_id);

        $this->assertTrue($transaction->paymentStatus == $paymentStatus);
    }
}
