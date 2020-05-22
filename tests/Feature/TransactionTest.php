<?php

namespace Tests\Feature;

use App\Account;
use App\Card;
use App\IncomeExpense;
use App\PaymentMethod;
use App\PaymentStatus;
use App\Transaction;
use App\TransactionAccount;
use App\TransactionCard;
use App\TransactionMovement;
use Illuminate\Foundation\Testing\RefreshDatabase;
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

    /*
     * Testing Relationship between Transaction and PaymentMethod
     * Transactions belongs to PaymentMethod
     */
    function testRelationshipTransactionPaymentMethods(){

        $transaction = factory(Transaction::class)->create();

        $transaction = Transaction::find($transaction->id);
        $paymentMethod = PaymentMethod::find($transaction->payment_method_id);

        $this->assertTrue($transaction->paymentMethod == $paymentMethod);
    }

    /*
     * Testing Relationship between Transaction and Account
     * Transaction belongs to many Account
     */
    function testRelationshipTransactionAccount(){

        $transactionAccount = factory(TransactionAccount::class)->create();

        $transaction = Transaction::find($transactionAccount->transaction_id);
        $account = Account::find($transactionAccount->account_id);

        $this->assertTrue($transaction->accounts->first()->id == $account->id);
    }

    /*
     * Testing Relationship between Transaction and Card
     * Transaction belongs to many Card
     */
    function testRelationshipTransactionCard(){

        $transactionCard = factory(TransactionCard::class)->create();

        $transaction = Transaction::find($transactionCard->transaction_id);
        $card = Card::find($transactionCard->card_id);

        $this->assertTrue($transaction->cards->first()->id == $card->id);
    }
}
