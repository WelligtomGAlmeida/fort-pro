<?php

namespace Tests\Feature;

use App\Account;
use App\IncomeExpense;
use App\Loan;
use App\LoanMovement;
use App\Person;
use App\TransactionParticipant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoanTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of a Loan in the database
     */
    function testCreateLoan(){

        $loan = factory(Loan::class)->create();

        $this->assertDatabaseHas('loans', ['id' => $loan->id]);
    }

    /*
     * Testing Relationship between Loan and Person
     * Loans belongs to Person
     */
    function testRelationshipLoanPerson(){

        $loan = factory(Loan::class)->create();

        $loan = Loan::find($loan->id);
        $person = Person::find($loan->person_id);

        $this->assertTrue($loan->person == $person);
    }

    /*
     * Testing Relationship between Loan and LoanMovement
     * Loans belongs to LoanMovement
     */
    function testRelationshipLoanLoanMovement(){

        $loan = factory(Loan::class)->create();

        $loan = Loan::find($loan->id);
        $loanMovement = LoanMovement::find($loan->loan_movement_id);

        $this->assertTrue($loan->loanMovement == $loanMovement);
    }

    /*
     * Testing Relationship between Loan and TransactionParticipant
     * Loans belongs to TransactionParticipant
     */
    function testRelationshipLoanTransactionParticipant(){

        $loan = factory(Loan::class)->create();

        $loan = Loan::find($loan->id);
        $transactionParticipant = TransactionParticipant::find($loan->transaction_participant_id);

        $this->assertTrue($loan->transactionParticipant == $transactionParticipant);
    }

    /*
     * Testing Relationship between Loan and creditAccount(Account)
     * Loans belongs to creditAccount(Account)
     */
    function testRelationshipLoanCreditAccount(){

        $loan = factory(Loan::class)->create();

        $loan = Loan::find($loan->id);
        $creditAccount = Account::find($loan->credit_account_id);

        $this->assertTrue($loan->creditAccount == $creditAccount);
    }

    /*
     * Testing Relationship between Loan and DebitAccount(Account)
     * Loans belongs to DebitAccount(Account)
     */
    function testRelationshipLoanDebitAccount(){

        $loan = factory(Loan::class)->create();

        $loan = Loan::find($loan->id);
        $debitAccount = Account::find($loan->debit_account_id);

        $this->assertTrue($loan->debitAccount == $debitAccount);
    }

    /*
     * Testing Relationship between Loan and Income(IncomeExpense)
     * Loans belongs to Income(IncomeExpense)
     */
    function testRelationshipLoanIncome(){

        $loan = factory(Loan::class)->create();

        $loan = Loan::find($loan->id);
        $income = IncomeExpense::find($loan->income_id);

        $this->assertTrue($loan->income == $income);
    }

    /*
     * Testing Relationship between Loan and Expense(IncomeExpense)
     * Loans belongs to Expense(IncomeExpense)
     */
    function testRelationshipLoanExpense(){

        $loan = factory(Loan::class)->create();

        $loan = Loan::find($loan->id);
        $expense = IncomeExpense::find($loan->expense_id);

        $this->assertTrue($loan->expense == $expense);
    }
}
