<?php

namespace Tests\Feature;

use App\AccountBalance;
use App\SavePoint;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SavePointTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of a SavePoint in the database
     */
    function testCreateSavePoint(){

        $savePoint = factory(SavePoint::class)->create();

        $this->assertDatabaseHas('saving_points', ['id' => $savePoint->id]);
    }

    /*
     * Testing Relationship between SavePoint and AccountBalance
     * SavePoint has many AccountBalances
     */
    function testRelationshipSavePointAccountBalance(){

        $accountBalance = factory(AccountBalance::class)->create();

        $savePoint = SavePoint::find($accountBalance->save_point_id);
        $accountBalance = AccountBalance::where([
            'account_id' => $accountBalance->account_id,
            'save_point_id' => $accountBalance->save_point_id
        ])->first();

        $this->assertTrue($savePoint->accountBalances->first() == $accountBalance);
    }
}
