<?php

namespace Tests\Feature;

use App\IncomeExpense;
use App\Loan;
use App\PaymentStatus;
use App\Person;
use App\Recurrence;
use App\Transaction;
use App\TransactionCategory;
use App\TransactionCategoryTransaction;
use App\TransactionMovement;
use App\TransactionParticipant;
use App\Transfer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IncomeExpenseTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of an IncomeExpense in the database
     */
    function testCreateIncomeExpense(){

        $incomeExpense = factory(IncomeExpense::class)->create();

        $this->assertDatabaseHas('incomes_expenses', ['id' => $incomeExpense->id]);
    }

    /*
     * Testing Relationship between IncomeExpense and Person
     * Incomes and Expenses belongs to Person
     */
    function testRelationshipIncomeExpensePerson(){

        $incomeExpense = factory(IncomeExpense::class)->create();

        $incomeExpense = IncomeExpense::find($incomeExpense->id);
        $person = Person::find($incomeExpense->person_id);

        $this->assertTrue($incomeExpense->person == $person);
    }

    /*
     * Testing Relationship between IncomeExpense and Recurrence
     * Incomes and Expenses belongs to Recurrence
     */
    function testRelationshipIncomeExpenseRecurrence(){

        $incomeExpense = factory(IncomeExpense::class)->create();

        $incomeExpense = IncomeExpense::find($incomeExpense->id);
        $recurrence = Recurrence::find($incomeExpense->recurrence_id);

        $this->assertTrue($incomeExpense->recurrence == $recurrence);
    }

    /*
     * Testing Relationship between IncomeExpense and PaymentStatus
     * Incomes and Expenses belongs to PaymentStatus
     */
    function testRelationshipIncomeExpensePaymentStatus(){

        $incomeExpense = factory(IncomeExpense::class)->create();

        $incomeExpense = IncomeExpense::find($incomeExpense->id);
        $paymentStatus = PaymentStatus::find($incomeExpense->payment_status_id);

        $this->assertTrue($incomeExpense->paymentStatus == $paymentStatus);
    }

    /*
     * Testing Relationship between IncomeExpense and TransactionMovement
     * Incomes and Expenses belongs to TransactionMovement
     */
    function testRelationshipIncomeExpenseTransactionMovement(){

        $incomeExpense = factory(IncomeExpense::class)->create();

        $incomeExpense = IncomeExpense::find($incomeExpense->id);
        $transactionMovement = TransactionMovement::find($incomeExpense->transaction_movement_id);

        $this->assertTrue($incomeExpense->transactionMovement == $transactionMovement);
    }

    /*
     * Testing Relationship between IncomeExpense and TransactionParticipant
     * Incomes and Expenses belongs to TransactionParticipant
     */
    function testRelationshipIncomeExpenseTransactionParticipant(){

        $incomeExpense = factory(IncomeExpense::class)->create();

        $incomeExpense = IncomeExpense::find($incomeExpense->id);
        $transactionParticipant = TransactionParticipant::find($incomeExpense->transaction_participant_id);

        $this->assertTrue($incomeExpense->transactionParticipant == $transactionParticipant);
    }

    /*
     * Testing Relationship between IncomeExpense and Transaction
     * IncomeExpense has many Transactions
     */
    function testRelationshipIncomeExpenseTransaction(){

        $transaction = factory(Transaction::class)->create();

        $incomeExpense = IncomeExpense::find($transaction->income_expense_id);
        $transaction = Transaction::find($transaction->id);

        $this->assertTrue($incomeExpense->transactions->first() == $transaction);
    }

    /*
     * Testing Relationship between IncomeExpense and CreditedLoan(Loan)
     * IncomeExpense has many CreditedLoan(Loan)
     */
    function testRelationshipIncomeExpenseCreditedLoan(){

        $creditedLoan = factory(Loan::class)->create();

        $incomeExpense = IncomeExpense::find($creditedLoan->income_id);
        $creditedLoan = Loan::find($creditedLoan->id);

        $this->assertTrue($incomeExpense->creditedLoan == $creditedLoan);
    }

    /*
     * Testing Relationship between IncomeExpense and DebitedLoan(Loan)
     * IncomeExpense has many DebitedLoan(Loan)
     */
    function testRelationshipIncomeExpenseDebitedLoan(){

        $debitedLoan = factory(Loan::class)->create();

        $incomeExpense = IncomeExpense::find($debitedLoan->expense_id);
        $debitedLoan = Loan::find($debitedLoan->id);

        $this->assertTrue($incomeExpense->debitedLoan == $debitedLoan);
    }

    /*
     * Testing Relationship between IncomeExpense and IncomingTransfer(Transfer)
     * IncomeExpense has many IncomingTransfer(Transfer)
     */
    function testRelationshipIncomeExpenseIncomingTransfer(){

        $incomingTransfer = factory(Transfer::class)->create();

        $incomeExpense = IncomeExpense::find($incomingTransfer->income_id);
        $incomingTransfer = Transfer::find($incomingTransfer->id);

        $this->assertTrue($incomeExpense->incomingTransfer == $incomingTransfer);
    }

    /*
     * Testing Relationship between IncomeExpense and OutgoingTransfer(Transfer)
     * IncomeExpense has many OutgoingTransfer(Transfer)
     */
    function testRelationshipIncomeExpenseOutgoingTransfer(){

        $outgoingTransfer = factory(Transfer::class)->create();

        $incomeExpense = IncomeExpense::find($outgoingTransfer->expense_id);
        $outgoingTransfer = Transfer::find($outgoingTransfer->id);

        $this->assertTrue($incomeExpense->outgoingTransfer == $outgoingTransfer);
    }

    /*
     * Testing Relationship between IncomeExpense and TransactionCategory
     * IncomeExpense belongs to many TransactionCategory
     */
    function testRelationshipIncomeExpenseTransactionCategory(){

        $transactionCategoryRelationship = factory(TransactionCategoryTransaction::class)->create();

        $incomeExpense = IncomeExpense::find($transactionCategoryRelationship->income_expense_id);
        $transactionCategory = TransactionCategory::find($transactionCategoryRelationship->transaction_category_id);

        $this->assertTrue($incomeExpense->transactionCategories->first()->id == $transactionCategory->id);
    }
}
