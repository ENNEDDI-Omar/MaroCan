<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'team_id' => function () {
                return \App\Models\Team::factory()->create()->id;
            },
            'name' => $this->faker->name,
            'position' => $this->faker->randomElement(['goalkeeper', 'defender', 'midfielder', 'forward']),
            'number_of_goals' => $this->faker->numberBetween(0, 30),
            'yellow_cards' => $this->faker->randomDigit,
            'red_cards' => $this->faker->randomDigit,
        ];
    }
}
