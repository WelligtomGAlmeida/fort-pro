<?php

namespace Tests\Feature;

use App\IncomeExpense;
use App\PaymentStatus;
use App\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaymentStatusTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of a PaymentStatus in the database
     */
    function testCreatePaymentStatus(){

        $paymentStatus = factory(PaymentStatus::class)->create();

        $this->assertDatabaseHas('payment_status', ['id' => $paymentStatus->id]);
    }

    /*
     * Testing Relationship between PaymentStatus and IncomeExpense
     * PaymentStatus has many Incomes and Expenses
     */
    function testRelationshipPaymentStatusIncomeExpense(){

        $incomeExpense = factory(IncomeExpense::class)->create();

        $paymentStatus = PaymentStatus::find($incomeExpense->payment_status_id);
        $incomeExpense = IncomeExpense::find($incomeExpense->id);

        $this->assertTrue($paymentStatus->incomesExpenses->first() == $incomeExpense);
    }

    /*
     * Testing Relationship between PaymentStatus and Transaction
     * PaymentStatus has many Transactions
     */
    function testRelationshipPaymentStatusTransaction(){

        $transaction = factory(Transaction::class)->create();

        $paymentStatus = PaymentStatus::find($transaction->payment_status_id);
        $transaction = Transaction::find($transaction->id);

        $this->assertTrue($paymentStatus->transactions->first() == $transaction);
    }
}
