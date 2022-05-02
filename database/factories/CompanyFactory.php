<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (! $user = User::inRandomOrder()->first()) {
            $user = User::factory()->create();
        }

        if (! $team = Team::inRandomOrder()->first()) {
            $team = Team::factory()->create();
        }

        return [
            'team_id' => Team::factory(),
            'name' => $this->faker->company,
            'created_by_id' => $user->id,
            'assigned_to_id' => $user->id,
        ];
    }
}
