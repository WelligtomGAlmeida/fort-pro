<?php

namespace Tests\Feature;

use App\Card;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CardTest extends TestCase
{
    use RefreshDatabase;

    function testCreateCard(){

        $card = factory(Card::class)->create();

        $this->assertDatabaseHas('cards', ['id' => $card->id]);
    }
}
