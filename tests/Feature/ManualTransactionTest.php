<?php

namespace Tests\Feature;

use App\ManualTransaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ManualTransactionTest extends TestCase
{
    use RefreshDatabase;

    function testCreateManualTransaction(){

        $manualTransaction = factory(ManualTransaction::class)->create();

        $this->assertDatabaseHas('manual_transactions', ['id' => $manualTransaction->id]);
    }
}
