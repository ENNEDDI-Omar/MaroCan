<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MediaPlatform>
 */
class MediaPlatformFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'mediaPlatform_code' => $this->faker->randomNumber(4),
            'type' => $this->faker->randomElement(['newspaper', 'radio', 'television', 'digital_media']),
        ];
    }
}
