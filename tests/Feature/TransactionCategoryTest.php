<?php

namespace Tests\Feature;

use App\TransactionCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransactionCategoryTest extends TestCase
{
    use RefreshDatabase;

    function testCreateTransactionCategory(){

        $transactionCategory = factory(TransactionCategory::class)->create();

        $this->assertDatabaseHas('transaction_categories', ['id' => $transactionCategory->id]);
    }
}
