<?php

namespace Tests\Feature;

use App\Models\user;
use App\Models\Tasks;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskControllerTest extends TestCase {

    use RefreshDatabase;

    protected function autenticate() {

        $user = User::factory()->create();
        $this->actingAs($user);
        return $user;

    }

    

}