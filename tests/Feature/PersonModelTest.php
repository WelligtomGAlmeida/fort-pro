<?php

namespace Tests\Feature;

use App\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PersonModelTest extends TestCase
{
    use RefreshDatabase;

    function testCreatingPersonUsingFillable(){
        $person = Person::create([
            'name' => 'Joe',
            'birth_date' => 10,
            'cpf' => '00000000000',
            'cell_phone' => '00000000000',
            'email' => 'joe@emailtest.com'
        ]);

        $this->assertDatabaseHas('people', ['id' => $person->id]);
    }
}
