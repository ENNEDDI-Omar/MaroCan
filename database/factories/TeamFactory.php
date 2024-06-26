<?php

namespace Database\Factories;

use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $uniqueSuffix = rand(1000, 9999);
        return [
            'group_id' => Group::inRandomOrder()->first()->id,
            'name' => $this->faker->unique()->company() . " " . $uniqueSuffix,
            'federation' => $this->faker->unique()->lexify('Federation of ???????'),
        ];
    }
}
