<?php

namespace Tests\Feature;

use App\IncomeExpense;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IncomeExpenseTest extends TestCase
{
    use RefreshDatabase;

    function testCreateIncomeExpense(){

        $incomeExpense = factory(IncomeExpense::class)->create();

        $this->assertDatabaseHas('incomes_expenses', ['id' => $incomeExpense->id]);
    }
}
