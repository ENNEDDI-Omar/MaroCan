<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Journalist>
 */
class JournalistFactory extends Factory
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
            'license_number' => $this->faker->unique()->randomNumber(8),
            

        ];
    }
}
