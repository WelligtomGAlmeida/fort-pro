<?php

namespace Tests\Feature;

use App\TransactionParticipant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransactionParticipantTest extends TestCase
{
    use RefreshDatabase;

    function testCreateTransactionParticipant(){

        $transactionParticipant = factory(TransactionParticipant::class)->create();

        $this->assertDatabaseHas('transaction_participants', ['id' => $transactionParticipant->id]);
    }
}
