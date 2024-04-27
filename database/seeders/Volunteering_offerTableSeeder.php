<?php

namespace Database\Seeders;

use App\Models\VolunteeringOffer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Volunteering_offerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VolunteeringOffer::factory(4)->create();
    }
}
