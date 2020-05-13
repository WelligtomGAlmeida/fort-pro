<?php

namespace Tests\Feature;

use App\IncomeExpense;
use App\Person;
use App\TransactionCategory;
use App\TransactionCategoryRelationship;
use App\TransactionMovement;
use App\Visibility;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransactionCategoryTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of a TransactionCategory in the database
     */
    function testCreateTransactionCategory(){

        $transactionCategory = factory(TransactionCategory::class)->create();

        $this->assertDatabaseHas('transaction_categories', ['id' => $transactionCategory->id]);
    }

    /*
     * Testing Relationship between TransactionCategory and Person
     * TransactionCategories belongs to Person
     */
    function testRelationshipTransactionCategoryPerson(){

        $transactionCategory = factory(TransactionCategory::class)->create();

        $transactionCategory = TransactionCategory::find($transactionCategory->id);
        $person = Person::find($transactionCategory->person_id);

        $this->assertTrue($transactionCategory->person == $person);
    }

    /*
     * Testing Relationship between TransactionCategory and TransactionMovement
     * TransactionCategories belongs to TransactionMovement
     */
    function testRelationshipTransactionCategoryTransactionMovement(){

        $transactionCategory = factory(TransactionCategory::class)->create();

        $transactionCategory = TransactionCategory::find($transactionCategory->id);
        $transactionMovement = TransactionMovement::find($transactionCategory->transaction_movement_id);

        $this->assertTrue($transactionCategory->transactionMovement == $transactionMovement);
    }

    /*
     * Testing Relationship between TransactionCategory and Visibility
     * TransactionCategories belongs to Visibility
     */
    function testRelationshipTransactionCategoryVisibility(){

        $transactionCategory = factory(TransactionCategory::class)->create();

        $transactionCategory = TransactionCategory::find($transactionCategory->id);
        $visibility = Visibility::find($transactionCategory->visibility_id);

        $this->assertTrue($transactionCategory->visibility == $visibility);
    }

    /*
     * Testing Relationship between TransactionCategory and IncomeExpense
     * TransactionCategory belongs to many IncomeExpense
     */
    function testRelationshipTransactionCategoryIncomeExpense(){

        $transactionCategoryRelationship = factory(TransactionCategoryRelationship::class)->create();

        $transactionCategory = TransactionCategory::find($transactionCategoryRelationship->transaction_category_id);
        $incomeExpense = IncomeExpense::find($transactionCategoryRelationship->income_expense_id);

        $this->assertTrue($transactionCategory->incomesExpenses->first()->id == $incomeExpense->id);
    }
}
