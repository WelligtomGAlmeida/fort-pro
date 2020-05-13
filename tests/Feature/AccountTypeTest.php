<?php

namespace Tests\Feature;

use App\Account;
use App\AccountType;
use App\Visibility;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountTypeTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of an AccountType in the database
     */
    function testCreateAccountType(){

        $accountType = factory(AccountType::class)->create();

        $this->assertDatabaseHas('account_types', ['id' => $accountType->id]);
    }

    /*
     * Testing Relationship between AccountType and Visibility
     * AccountType belongs to Visibility
     */
    function testRelationshipAccountTypeVisibility(){

        $accountType = factory(AccountType::class)->create();

        $accountType = AccountType::find($accountType->id);
        $visibility = Visibility::find($accountType->visibility_id);

        $this->assertTrue($accountType->visibility == $visibility);
    }

    /*
     * Testing Relationship between AccountType and Account
     * AccountType has many Accounts
     */
    function testRelationshipAccountTypeAccount(){

        $account = factory(Account::class)->create();

        $accountType = AccountType::find($account->account_type_id);
        $account = Account::find($account->id);

        $this->assertTrue($accountType->accounts->first() == $account);
    }
}
