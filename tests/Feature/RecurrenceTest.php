<?php

namespace Tests\Feature;

use App\Recurrence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecurrenceTest extends TestCase
{
    use RefreshDatabase;

    function testCreateRecurrence(){

        $recurrence = factory(Recurrence::class)->create();

        $this->assertDatabaseHas('recurrences', ['id' => $recurrence->id]);
    }
}
