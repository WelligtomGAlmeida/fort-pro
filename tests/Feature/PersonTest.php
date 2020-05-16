<?php

namespace Tests\Feature;

use App\Account;
use App\IncomeExpense;
use App\Loan;
use App\Person;
use App\TransactionCategory;
use App\TransactionParticipant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PersonTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of a Person in the database
     */
    function testCreatePerson(){

        $person = factory(Person::class)->create();

        $this->assertDatabaseHas('people', ['id' => $person->id]);
    }

    /*
     * Testing Relationship between Person and Account
     * Person has many Accounts
     */
    function testRelationshipPersonAccounts(){

        $account = factory(Account::class)->create();

        $person = Person::find($account->person_id);
        $account = Account::find($account->id);

        $this->assertTrue($person->accounts->first() == $account);
    }

    /*
     * Testing Relationship between Person and IncomeExpense
     * Person has many IncomesExpenses
     */
    function testRelationshipPersonIncomesExpenses(){

        $incomeExpense = factory(IncomeExpense::class)->create();

        $person = Person::find($incomeExpense->person_id);
        $incomeExpense = IncomeExpense::find($incomeExpense->id);

        $this->assertTrue($person->incomesExpenses->first() == $incomeExpense);
    }

    /*
     * Testing Relationship between Person and Loan
     * Person has many Loans
     */
    function testRelationshipPersonLoans(){

        $loan = factory(Loan::class)->create();

        $person = Person::find($loan->person_id);
        $loan = Loan::find($loan->id);

        $this->assertTrue($person->loans->first() == $loan);
    }

    /*
     * Testing Relationship between Person and TransactionCategory
     * Person has many TransactionCategories
     */
    function testRelationshipPersonTransactionCategories(){

        $transactionCategory = factory(TransactionCategory::class)->create();

        $person = Person::find($transactionCategory->person_id);
        $transactionCategory = TransactionCategory::find($transactionCategory->id);

        $this->assertTrue($person->transactionCategories->first() == $transactionCategory);
    }

    /*
     * Testing Relationship between Person and TransactionParticipant
     * Person has many TransactionParticipants
     */
    function testRelationshipPersonTransactionParticipants(){

        $transactionParticipant = factory(TransactionParticipant::class)->create();

        $person = Person::find($transactionParticipant->person_id);
        $transactionParticipant = TransactionParticipant::find($transactionParticipant->id);

        $this->assertTrue($person->transactionParticipants->first() == $transactionParticipant);
    }
}
