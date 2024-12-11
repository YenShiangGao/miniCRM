<?php

namespace Database\Factories;

use App\Enums\ProjectStatus;
use App\Models\Client;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::query()->pluck('id');
        $clients = Client::query()->pluck('id');

        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'deadline_at' => Carbon::now()->addDays(rand(1, 30))->toDateString(),
            'status' => $this->faker->randomElement(ProjectStatus::cases())->value,
            'user_id' => $users->random(),
            'client_id' => $clients->random(),
        ];
    }
}
