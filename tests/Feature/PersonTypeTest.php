<?php

namespace Tests\Feature;

use App\PersonType;
use App\TransactionParticipant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PersonTypeTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of a PersonType in the database
     */
    function testCreatePersonType(){

        $personType = factory(PersonType::class)->create();

        $this->assertDatabaseHas('person_types', ['id' => $personType->id]);
    }

    /*
     * Testing Relationship between PersonType and TransactionParticipant
     * PersonType has many TransactionParticipants
     */
    function testRelationshipPersonTypeTransactionParticipant(){

        $transactionParticipant = factory(TransactionParticipant::class)->create();

        $personType = PersonType::find($transactionParticipant->person_type_id);
        $transactionParticipant = TransactionParticipant::find($transactionParticipant->id);

        $this->assertTrue($personType->transactionParticipants->first() == $transactionParticipant);
    }
}
