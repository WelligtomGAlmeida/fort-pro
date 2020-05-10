<?php

namespace Tests\Feature;

use App\Bank;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BankTest extends TestCase
{
    use RefreshDatabase;

    function testCreateBank(){

        $bank = factory(Bank::class)->create();

        $this->assertDatabaseHas('banks', ['id' => $bank->id]);
    }
}
