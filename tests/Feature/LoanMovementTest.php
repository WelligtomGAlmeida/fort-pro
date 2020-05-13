<?php

namespace Tests\Feature;

use App\Loan;
use App\LoanMovement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoanMovementTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of a LoanMovement in the database
     */
    function testCreateLoanMovement(){

        $loanMovement = factory(LoanMovement::class)->create();

        $this->assertDatabaseHas('loan_movements', ['id' => $loanMovement->id]);
    }

    /*
     * Testing Relationship between LoanMovement and Loan
     * LoanMovement has many Loans
     */
    function testRelationshipLoanMovementLoan(){

        $loan = factory(Loan::class)->create();

        $loanMovement = LoanMovement::find($loan->loan_movement_id);
        $loan = Loan::find($loan->id);

        $this->assertTrue($loanMovement->loans->first() == $loan);
    }
}
