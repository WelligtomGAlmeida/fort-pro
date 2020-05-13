<?php

namespace Tests\Feature;

use App\Card;
use App\CardType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CardTypeTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of a CardType in the database
     */
    function testCreateCardType(){

        $cardType = factory(CardType::class)->create();

        $this->assertDatabaseHas('card_types', ['id' => $cardType->id]);
    }

    /*
     * Testing Relationship between CardType and Card
     * CardType has many Cards
     */
    function testRelationshipCardTypeCards(){

        $card = factory(Card::class)->create();

        $cardType = CardType::find($card->card_type_id);
        $card = Card::find($card->id);

        $this->assertTrue($cardType->cards->first() == $card);
    }
}
