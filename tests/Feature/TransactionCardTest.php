<?php

namespace Tests\Feature;

use App\TransactionCard;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransactionCardTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of a TransactionCard in the database
     */
    function testCreateTransactionCard(){

        $transactionCard = factory(TransactionCard::class)->create();

        $this->assertDatabaseHas('transactions_cards', ['card_id' => $transactionCard->card_id, 'transaction_id' => $transactionCard->transaction_id]);
    }
}
