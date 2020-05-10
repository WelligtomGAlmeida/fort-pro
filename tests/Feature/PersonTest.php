<?php

namespace Tests\Feature;

use App\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PersonTest extends TestCase
{
    use RefreshDatabase;

    function testCreatePerson(){

        $person = factory(Person::class)->create();

        $this->assertDatabaseHas('people', ['id' => $person->id]);
    }
}
