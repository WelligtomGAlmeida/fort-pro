<?php

namespace Tests\Feature;

use App\Account;
use App\ManualTransaction;
use App\Person;
use App\Transaction;
use App\TransactionMovement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ManualTransactionTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of a ManualTransaction in the database
     */
    function testCreateManualTransaction(){

        $manualTransaction = factory(ManualTransaction::class)->create();

        $this->assertDatabaseHas('manual_transactions', ['id' => $manualTransaction->id]);
    }

    /*
     * Testing Relationship between ManualTransaction and Person
     * ManualTransactions belongs to Person
     */
    function testRelationshipManualTransactionPerson(){

        $manualTransaction = factory(ManualTransaction::class)->create();

        $manualTransaction = ManualTransaction::find($manualTransaction->id);
        $person = Person::find($manualTransaction->person_id);

        $this->assertTrue($manualTransaction->person == $person);
    }

    /*
     * Testing Relationship between ManualTransaction and Account
     * ManualTransactions belongs to Account
     */
    function testRelationshipManualTransactionAccount(){

        $manualTransaction = factory(ManualTransaction::class)->create();

        $manualTransaction = ManualTransaction::find($manualTransaction->id);
        $account = Account::find($manualTransaction->account_id);

        $this->assertTrue($manualTransaction->account == $account);
    }

    /*
     * Testing Relationship between ManualTransaction and TransactionMovement
     * ManualTransactions belongs to TransactionMovement
     */
    function testRelationshipManualTransactionTransactionMovement(){

        $manualTransaction = factory(ManualTransaction::class)->create();

        $manualTransaction = ManualTransaction::find($manualTransaction->id);
        $transactionMovement = TransactionMovement::find($manualTransaction->transaction_movement_id);

        $this->assertTrue($manualTransaction->transactionMovement == $transactionMovement);
    }

    /*
     * Testing Relationship between ManualTransaction and Transaction
     * ManualTransaction has many Transactions
     */
    function testRelationshipManualTransactionTransaction(){

        $transaction = factory(Transaction::class)->create();

        $manualTransaction = ManualTransaction::find($transaction->manual_transaction_id);
        $transaction = Transaction::find($transaction->id);

        $this->assertTrue($manualTransaction->transactions->first() == $transaction);
    }
}
