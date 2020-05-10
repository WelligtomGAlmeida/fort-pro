<?php

namespace Tests\Feature;

use App\LoanMovement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoanMovementTest extends TestCase
{
    use RefreshDatabase;

    function testCreateLoanMovement(){

        $loanMovement = factory(LoanMovement::class)->create();

        $this->assertDatabaseHas('loan_movements', ['id' => $loanMovement->id]);
    }
}
