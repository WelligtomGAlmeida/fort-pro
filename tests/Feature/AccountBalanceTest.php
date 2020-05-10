<?php

namespace Tests\Feature;

use App\AccountBalance;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountBalanceTest extends TestCase
{
    use RefreshDatabase;

    function testCreateAccountBalance(){

        $accountBalance = factory(AccountBalance::class)->create();

        $this->assertDatabaseHas('account_balances', ['account_id' => $accountBalance->account_id, 'save_point_id' => $accountBalance->save_point_id]);
    }
}
