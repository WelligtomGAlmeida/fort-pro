<?php

namespace Tests\Feature;

use App\IncomeExpense;
use App\Recurrence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecurrenceTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of a Recurrence in the database
     */
    function testCreateRecurrence(){

        $recurrence = factory(Recurrence::class)->create();

        $this->assertDatabaseHas('recurrences', ['id' => $recurrence->id]);
    }

    /*
     * Testing Relationship between Recurrence and IncomeExpense
     * Recurrence has many IncomesExpenses
     */
    function testRelationshipRecurrenceIncomeExpense(){

        $incomeExpense = factory(IncomeExpense::class)->create();

        $recurrence = Recurrence::find($incomeExpense->recurrence_id);
        $incomeExpense = IncomeExpense::find($incomeExpense->id);

        $this->assertTrue($recurrence->incomesExpenses->first() == $incomeExpense);
    }
}
