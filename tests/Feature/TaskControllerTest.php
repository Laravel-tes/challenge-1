<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Tasks;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{

    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        \Artisan::call('migrate:fresh', ['--env' => 'testing']);
    }

    protected function autenticate()
    {

        $user = User::factory()->create();
        $this->actingAs($user);
        return $user;

    }

    public function test_create_task(): void
    {

        $user = $this->autenticate();

        $payload = [
            'title' => 'Nova Task',
            'description' => 'Nova descrição',
            'user_id' => $user->id,
        ];

        $response = $this->postJson('/api/tasks', $payload);

        $response->assertStatus(201);
        $this->assertDatabaseHas('tasks', ['title' => 'Nova Task']);

    }

    public function test_list_task(): void{

        $user = $this->autenticate();

        //usuario autenticado
        Tasks::factory()->count(3)->create(['user_id' => $user->id,]);

        //usuario não autenticado
        Tasks::factory()->count(4)->create();

        $response = $this->actingAs($user)->getJson('/api/tasks');

        $response->assertStatus(200);

        $response->assertJsonCount(3);

    }

    public function test_update_status(): void{

        $user = $this->autenticate();
        $task = Tasks::factory()->create(['user_id' => $user->id, 'status' => 'completed']);

        $response = $this->patchJson("/api/task/{$task->id}/status", ['status' => 'in_progress']);

        $response->assertStatus(200);
        $this->assertDatabaseHas('tasks', ['id' => $task->id, 'status' => 'in_progress']);



    }

}
