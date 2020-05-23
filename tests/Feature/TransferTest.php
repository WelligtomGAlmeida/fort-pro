<?php

namespace Tests\Feature;

use App\Account;
use App\IncomeExpense;
use App\Person;
use App\Transfer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransferTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of a Transfer in the database
     */
    function testCreateLoan(){

        $transfer = factory(Transfer::class)->create();

        $this->assertDatabaseHas('transfers', ['id' => $transfer->id]);
    }

    /*
     * Testing Relationship between Transfer and Person
     * Transfers belongs to Person
     */
    function testRelationshipTransferPerson(){

        $transfer = factory(Transfer::class)->create();

        $transfer = Transfer::find($transfer->id);
        $person = Person::find($transfer->person_id);

        $this->assertTrue($transfer->person == $person);
    }

    /*
     * Testing Relationship between Transfer and creditAccount(Account)
     * Transfers belongs to creditAccount(Account)
     */
    function testRelationshipTransferCreditAccount(){

        $transfer = factory(Transfer::class)->create();

        $transfer = Transfer::find($transfer->id);
        $creditAccount = Account::find($transfer->credit_account_id);

        $this->assertTrue($transfer->creditAccount == $creditAccount);
    }

    /*
     * Testing Relationship between Transfer and DebitAccount(Account)
     * Transfers belongs to DebitAccount(Account)
     */
    function testRelationshipTransferDebitAccount(){

        $transfer = factory(Transfer::class)->create();

        $transfer = Transfer::find($transfer->id);
        $debitAccount = Account::find($transfer->debit_account_id);

        $this->assertTrue($transfer->debitAccount == $debitAccount);
    }

    /*
     * Testing Relationship between Transfer and Income(IncomeExpense)
     * Transfers belongs to Income(IncomeExpense)
     */
    function testRelationshipTransferIncome(){

        $transfer = factory(Transfer::class)->create();

        $transfer = Transfer::find($transfer->id);
        $income = IncomeExpense::find($transfer->income_id);

        $this->assertTrue($transfer->income == $income);
    }

    /*
     * Testing Relationship between Transfer and Expense(IncomeExpense)
     * Transfers belongs to Expense(IncomeExpense)
     */
    function testRelationshipTransferExpense(){

        $transfer = factory(Transfer::class)->create();

        $transfer = Transfer::find($transfer->id);
        $expense = IncomeExpense::find($transfer->expense_id);

        $this->assertTrue($transfer->expense == $expense);
    }
}
