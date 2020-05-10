<?php

namespace Tests\Feature;

use App\CardType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CardTypeTest extends TestCase
{
    use RefreshDatabase;

    function testCreateCardType(){

        $cardType = factory(CardType::class)->create();

        $this->assertDatabaseHas('card_types', ['id' => $cardType->id]);
    }
}
