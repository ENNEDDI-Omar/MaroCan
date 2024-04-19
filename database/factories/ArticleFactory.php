<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'journalist_id' => function () {
                return \App\Models\Journalist::factory()->create()->id;
            },
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['draft', 'published']),
            'published_at' => $this->faker->dateTime,
            
        ];
    }
}
