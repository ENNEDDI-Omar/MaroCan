<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FootBallMatchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'team1_id' => function () {
                return \App\Models\Team::factory()->create()->id;
            },
            'team2_id' => function () {
                return \App\Models\Team::factory()->create()->id;
            },
            'stadium' => $this->faker->company,
            'city' => $this->faker->city,
            'match_date' => $this->faker->dateTimeBetween('+1 day', '+1 month'),
            'number_of_seats' => $this->faker->numberBetween(1000, 10000),
            'status' => $this->faker->randomElement(['available', 'sold_out']),
        ];
    }
}
