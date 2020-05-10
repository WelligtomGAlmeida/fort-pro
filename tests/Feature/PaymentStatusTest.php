<?php

namespace Tests\Feature;

use App\PaymentStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaymentStatusTest extends TestCase
{
    use RefreshDatabase;

    function testCreatePaymentStatus(){

        $paymentStatus = factory(PaymentStatus::class)->create();

        $this->assertDatabaseHas('payment_status', ['id' => $paymentStatus->id]);
    }
}
