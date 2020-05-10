<?php

namespace Tests\Feature;

use App\AccountCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountCategoryTest extends TestCase
{
    use RefreshDatabase;

    function testCreateAccountCategory(){

        $accountCategory = factory(AccountCategory::class)->create();

        $this->assertDatabaseHas('account_categories', ['id' => $accountCategory->id]);
    }
}
