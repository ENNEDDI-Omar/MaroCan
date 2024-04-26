<?php

namespace Database\Factories;

use App\Models\AccreditationBadge;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AccreditationBadge>
 */
class AccreditationBadgeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (AccreditationBadge::count() < 100) {
            
             

            return [
                
                'license_number' => $this->faker->unique()->numerify('LN###'),
                'user_id' => function () {
                    return \App\Models\User::factory()->create()->id;
                },
                'mediaPlatform_id' => function () {
                    return \App\Models\MediaPlatform::factory()->create()->id;
                },
            ];
        } else {
            // Si le nombre de badges atteint 100, retourner un tableau vide pour ne pas créer de badge
            return [];
        }
    }
}
