<?php

namespace Tests\Feature;

use App\TransactionAccount;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransactionAccountTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of a TransactionAccount in the database
     */
    function testCreateTransactionAccount(){

        $transactionAccount = factory(TransactionAccount::class)->create();

        $this->assertDatabaseHas('transactions_accounts', ['account_id' => $transactionAccount->account_id, 'transaction_id' => $transactionAccount->transaction_id]);
    }
}
