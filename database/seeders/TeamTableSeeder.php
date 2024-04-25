<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Team::factory(32)->create();

        $groups = Group::all();
        for ($i = 0; $i < 32; $i++) {
            Team::create([
                'group_id' => $groups[$i % 8]->id,  // Cycle through groups
                'name' => fake()->unique()->company,
                'federation' => fake()->unique()->word,
            ]);
        }
    }
}
