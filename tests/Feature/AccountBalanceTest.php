<?php

namespace Tests\Feature;

use App\Account;
use App\AccountBalance;
use App\SavePoint;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountBalanceTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of an AccountBalance in the database
     */
    function testCreateAccountBalance(){

        $accountBalance = factory(AccountBalance::class)->create();

        $this->assertDatabaseHas('account_balances', ['account_id' => $accountBalance->account_id, 'save_point_id' => $accountBalance->save_point_id]);
    }

    /*
     * Testing Relationship between AccountBalance and Account
     * AccountBalances belongs to Account
     */
    function testRelationshipAccountBalanceAccount(){

        $accountBalance = factory(AccountBalance::class)->create();

        $accountBalance = AccountBalance::where([
            'account_id' => $accountBalance->account_id,
            'save_point_id' => $accountBalance->save_point_id,
        ])->first();
        $account = Account::find($accountBalance->account_id);

        $this->assertTrue($accountBalance->account == $account);
    }

    /*
     * Testing Relationship between AccountBalance and SavePoint
     * AccountBalances belongs to SavePoint
     */
    function testRelationshipAccountBalanceSavePoint(){

        $accountBalance = factory(AccountBalance::class)->create();

        $accountBalance = AccountBalance::where([
            'account_id' => $accountBalance->account_id,
            'save_point_id' => $accountBalance->save_point_id,
        ])->first();
        $savePoint = SavePoint::find($accountBalance->save_point_id);

        $this->assertTrue($accountBalance->savePoint == $savePoint);
    }

}
