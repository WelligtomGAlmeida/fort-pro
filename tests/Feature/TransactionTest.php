<?php

namespace Tests\Feature;

use App\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    use RefreshDatabase;

    function testCreateTransaction(){

        $transaction = factory(Transaction::class)->create();

        $this->assertDatabaseHas('transactions', ['id' => $transaction->id]);
    }
}
