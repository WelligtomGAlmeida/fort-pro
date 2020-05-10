<?php

namespace Tests\Feature;

use App\PersonType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PersonTypeTest extends TestCase
{
    use RefreshDatabase;

    function testCreatePersonType(){

        $personType = factory(PersonType::class)->create();

        $this->assertDatabaseHas('person_types', ['id' => $personType->id]);
    }
}
