<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VolunteeringOffer>
 */
class VolunteeringOfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'football_match_id' => \App\Models\FootballMatch::factory(), // Assurez-vous que FootballMatch est importé ou existe.
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'position' => $this->faker->text,
            'status' => $this->faker->randomElement(['available', 'not available']),
            'number_of_volunteers' => $this->faker->numberBetween(1, 100),
        ];
    }
}
