<?php

namespace Tests\Feature;

use App\Account;
use App\Bank;
use App\Card;
use App\CardType;
use App\Transaction;
use App\TransactionCard;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CardTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of a Card in the database
     */
    function testCreateCard(){

        $card = factory(Card::class)->create();

        $this->assertDatabaseHas('cards', ['id' => $card->id]);
    }

    /*
     * Testing Relationship between Card and CardType
     * Cards belongs to CardType
     */
    function testRelationshipCardCardType(){

        $card = factory(Card::class)->create();

        $card = Card::find($card->id);
        $cardType = CardType::find($card->card_type_id);

        $this->assertTrue($card->cardType == $cardType);
    }

    /*
     * Testing Relationship between Card and CardType
     * Cards belongs to CardType
     */
    function testRelationshipCardAccount(){

        $card = factory(Card::class)->create();

        $card = Card::find($card->id);
        $account = Account::find($card->account_id);

        $this->assertTrue($card->account == $account);
    }

    /*
     * Testing Relationship between Card and Bank
     * Cards belongs to Bank
     */
    function testRelationshipCardBank(){

        $card = factory(Card::class)->create();

        $card = Card::find($card->id);
        $bank = Bank::find($card->bank_id);

        $this->assertTrue($card->bank == $bank);
    }

    /*
     * Testing Relationship between Card and Transactions
     * Card belongs to many Transactions
     */
    function testRelationshipCardTransaction(){

        $transactionCard = factory(TransactionCard::class)->create();

        $transaction = Transaction::find($transactionCard->transaction_id);
        $card = Card::find($transactionCard->card_id);

        $this->assertTrue($card->transactions->first()->id == $transaction->id);
    }

}
