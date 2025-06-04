<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Tasks;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tasks>
 */
class TasksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Tasks::class;
     
    public function definition(): array
    {
        return [
            //
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['pending', 'in_progress', 'completed']),
            'user_id' => User::factory(),
        ];
    }
}
