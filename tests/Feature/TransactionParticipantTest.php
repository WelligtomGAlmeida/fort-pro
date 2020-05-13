<?php

namespace Tests\Feature;

use App\IncomeExpense;
use App\Loan;
use App\Person;
use App\PersonType;
use App\TransactionParticipant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransactionParticipantTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of a TransactionParticipant in the database
     */
    function testCreateTransactionParticipant(){

        $transactionParticipant = factory(TransactionParticipant::class)->create();

        $this->assertDatabaseHas('transaction_participants', ['id' => $transactionParticipant->id]);
    }

    /*
     * Testing Relationship between TransactionParticipant and Person
     * TransactionParticipants belongs to Person
     */
    function testRelationshipTransactionParticipantPerson(){

        $transactionParticipant = factory(TransactionParticipant::class)->create();

        $transactionParticipant = TransactionParticipant::find($transactionParticipant->id);
        $person = Person::find($transactionParticipant->person_id);

        $this->assertTrue($transactionParticipant->person == $person);
    }

    /*
     * Testing Relationship between TransactionParticipant and PersonType
     * TransactionParticipants belongs to PersonType
     */
    function testRelationshipTransactionParticipantPersonType(){

        $transactionParticipant = factory(TransactionParticipant::class)->create();

        $transactionParticipant = TransactionParticipant::find($transactionParticipant->id);
        $personType = PersonType::find($transactionParticipant->person_type_id);

        $this->assertTrue($transactionParticipant->personType == $personType);
    }

    /*
     * Testing Relationship between TransactionParticipant and IncomeExpense
     * TransactionParticipant has many IncomeExpenses
     */
    function testRelationshipTransactionParticipantIncomeExpense(){

        $incomeExpense = factory(IncomeExpense::class)->create();

        $transactionParticipant = TransactionParticipant::find($incomeExpense->transaction_participant_id);
        $incomeExpense = IncomeExpense::find($incomeExpense->id);

        $this->assertTrue($transactionParticipant->incomesExpenses->first() == $incomeExpense);
    }

    /*
     * Testing Relationship between TransactionParticipant and Loan
     * TransactionParticipant has many Loans
     */
    function testRelationshipTransactionParticipantLoan(){

        $loan = factory(Loan::class)->create();

        $transactionParticipant = TransactionParticipant::find($loan->transaction_participant_id);
        $loan = Loan::find($loan->id);

        $this->assertTrue($transactionParticipant->loans->first() == $loan);
    }
}
