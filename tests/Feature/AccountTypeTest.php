<?php

namespace Tests\Feature;

use App\AccountType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountTypeTest extends TestCase
{
    use RefreshDatabase;

    function testCreateAccountType(){

        $accountType = factory(AccountType::class)->create();

        $this->assertDatabaseHas('account_types', ['id' => $accountType->id]);
    }
}
