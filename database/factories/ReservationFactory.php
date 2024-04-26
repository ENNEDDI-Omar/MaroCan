<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'football_match_id' => function () {
                return \App\Models\FootballMatch::factory()->create()->id;
            },
            'zone' => $this->faker->randomElement(['gradins', 'tribunes', 'vip']),
            'number_of_tickets' => $this->faker->numberBetween(1, 4),
            'total_price' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
