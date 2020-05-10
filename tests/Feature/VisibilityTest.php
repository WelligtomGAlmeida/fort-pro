<?php

namespace Tests\Feature;

use App\Visibility;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VisibilityTest extends TestCase
{
    use RefreshDatabase;

    function testCreateVisibility(){

        $visibility = factory(Visibility::class)->create();

        $this->assertDatabaseHas('visibilities', ['id' => $visibility->id]);
    }
}
