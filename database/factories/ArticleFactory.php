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
            'accreditation_id' => function () {
                return \App\Models\AccreditationBadge::factory()->create()->id;
            },
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraphs(3, true),
            'status' => $this->faker->randomElement(['draft', 'published', 'pending']),
            'published_at' => $this->faker->dateTimeBetween('-4 days', 'now'),
            
        ];
    }
}
