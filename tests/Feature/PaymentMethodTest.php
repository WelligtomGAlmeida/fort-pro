<?php

namespace Tests\Feature;

use App\PaymentMethod;
use App\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaymentMethodTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of a PaymentMethod in the database
     */
    function testCreatePaymentMethod(){

        $paymentMethod = factory(PaymentMethod::class)->create();

        $this->assertDatabaseHas('payment_methods', ['id' => $paymentMethod->id]);
    }

    /*
     * Testing Relationship between PaymentMethod and Transaction
     * PaymentMethod has many Transactions
     */
    function testRelationshipPaymentMethodTransaction(){

        $transaction = factory(Transaction::class)->create();

        $paymentMethod = PaymentMethod::find($transaction->payment_method_id);
        $transaction = Transaction::find($transaction->id);

        $this->assertTrue($paymentMethod->transactions->first() == $transaction);
    }
}
