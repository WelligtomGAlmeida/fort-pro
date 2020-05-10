<?php

namespace Tests\Feature;

use App\TransactionMovement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransactionMovementTest extends TestCase
{
    use RefreshDatabase;

    function testCreateTransactionMovement(){

        $transactionMovement = factory(TransactionMovement::class)->create();

        $this->assertDatabaseHas('transaction_movements', ['id' => $transactionMovement->id]);
    }
}
