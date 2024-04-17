<?php

namespace Database\Seeders;

use App\Models\Journalist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JournalistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Journalist::factory()->count(2)->create();
    }
}
