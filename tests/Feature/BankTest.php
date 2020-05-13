<?php

namespace Tests\Feature;

use App\Account;
use App\Bank;
use App\Card;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BankTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of a Bank in the database
     */
    function testCreateBank(){

        $bank = factory(Bank::class)->create();

        $this->assertDatabaseHas('banks', ['id' => $bank->id]);
    }

    /*
     * Testing Relationship between Bank and Account
     * Bank has many Accounts
     */
    function testRelationshipPersonAccounts(){

        $account = factory(Account::class)->create();

        $bank = Bank::find($account->bank_id);
        $account = Account::find($account->id);

        $this->assertTrue($bank->accounts->first() == $account);
    }

    /*
     * Testing Relationship between Bank and Card
     * Bank has many Cards
     */
    function testRelationshipPersonIncomesExpenses(){

        $card = factory(Card::class)->create();

        $bank = Bank::find($card->bank_id);
        $card = Card::find($card->id);

        $this->assertTrue($bank->cards->first() == $card);
    }
}
