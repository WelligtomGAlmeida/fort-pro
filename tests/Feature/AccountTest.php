<?php

namespace Tests\Feature;

use App\Account;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountTest extends TestCase
{
    use RefreshDatabase;

    function testCreateAccount(){

        $account = factory(Account::class)->create();

        $this->assertDatabaseHas('accounts', ['id' => $account->id]);
    }
}
