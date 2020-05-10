<?php

namespace Tests\Feature;

use App\SavePoint;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SavePointTest extends TestCase
{
    use RefreshDatabase;

    function testCreateSavePoint(){

        $savePoint = factory(SavePoint::class)->create();

        $this->assertDatabaseHas('saving_points', ['id' => $savePoint->id]);
    }
}
