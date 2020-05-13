<?php

namespace Tests\Feature;

use App\Account;
use App\AccountCategory;
use App\Visibility;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountCategoryTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of an AccountCategory in the database
     */
    function testCreateAccountCategory(){

        $accountCategory = factory(AccountCategory::class)->create();

        $this->assertDatabaseHas('account_categories', ['id' => $accountCategory->id]);
    }

    /*
     * Testing Relationship between AccountCategory and Visibility
     * AccountCategory belongs to Visibility
     */
    function testRelationshipAccountCategoryVisibility(){

        $accountCategory = factory(AccountCategory::class)->create();

        $accountCategory = AccountCategory::find($accountCategory->id);
        $visibility = Visibility::find($accountCategory->visibility_id);

        $this->assertTrue($accountCategory->visibility == $visibility);
    }

    /*
     * Testing Relationship between AccountCategory and Accounts
     * AccountCategory has many Accounts
     */
    function testRelationshipAccountCategoryAccounts(){

        $account = factory(Account::class)->create();

        $accountCategory = AccountCategory::find($account->account_category_id);
        $account = Account::find($account->id);

        $this->assertTrue($accountCategory->accounts->first() == $account);
    }
}
