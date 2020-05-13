<?php

namespace Tests\Feature;

use App\AccountCategory;
use App\AccountType;
use App\TransactionCategory;
use App\Visibility;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VisibilityTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of a Visibility in the database
     */
    function testCreateVisibility(){

        $visibility = factory(Visibility::class)->create();

        $this->assertDatabaseHas('visibilities', ['id' => $visibility->id]);
    }

    /*
     * Testing Relationship between Visibility and AccountCategory
     * Visibility has many AccountCategory
     */
    function testRelationshipVisibilityAccountCategories(){

        $accountCategory = factory(AccountCategory::class)->create();

        $visibility = Visibility::find($accountCategory->visibility_id);
        $accountCategory = AccountCategory::find($accountCategory->id);

        $this->assertTrue($visibility->accountCategories->first() == $accountCategory);
    }

    /*
     * Testing Relationship between Visibility and AccountType
     * Visibility has many AccountType
     */
    function testRelationshipVisibilityAccountTypes(){

        $accountType = factory(AccountType::class)->create();

        $visibility = Visibility::find($accountType->visibility_id);
        $accountType = AccountType::find($accountType->id);

        $this->assertTrue($visibility->accountTypes->first() == $accountType);
    }

    /*
     * Testing Relationship between Visibility and TransactionCategory
     * Visibility has many TransactionCategory
     */
    function testRelationshipVisibilityTransactionCategories(){

        $transactionCategory = factory(TransactionCategory::class)->create();

        $visibility = Visibility::find($transactionCategory->visibility_id);
        $transactionCategory = TransactionCategory::find($transactionCategory->id);

        $this->assertTrue($visibility->transactionCategories->first() == $transactionCategory);
    }
}
