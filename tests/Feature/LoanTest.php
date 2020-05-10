<?php

namespace Tests\Feature;

use App\Loan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoanTest extends TestCase
{
    use RefreshDatabase;

    function testCreateLoan(){

        $loan = factory(Loan::class)->create();

        $this->assertDatabaseHas('loans', ['id' => $loan->id]);
    }
}
