<?php

namespace Database\Seeders;

use App\Models\FootballMatch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FootballMatchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FootballMatch::factory(6)->create();
    }
}
