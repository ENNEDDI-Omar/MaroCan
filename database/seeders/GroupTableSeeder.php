<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Group::factory(8)->create();

        $groupNames = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
        foreach ($groupNames as $name) {
            Group::create(['name' => $name]);
        }
    }
}
