<?php

namespace Database\Seeders;

use App\Models\AccreditationBadge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccreditationBadgeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         AccreditationBadge::factory()->count(3)->create();
         

    }
}
