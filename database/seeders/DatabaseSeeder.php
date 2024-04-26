<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserTableSeeder::class,
            RoleTableSeeder::class,
            RoleUserTableSeeder::class,
            MediaPlatformTableSeeder::class,
            AccreditationBadgeTableSeeder::class,
            ArticleTableSeeder::class,
            TagTableSeeder::class,
            ArticleTagTableSeeder::class,
            GroupTableSeeder::class,
            TeamTableSeeder::class,
            ManagerTableSeeder::class,
            PlayerTableSeeder::class,
            FootballMatchTableSeeder::class,
            Volunteering_offerTableSeeder::class,
            ApplicationTableSeeder::class,
            ReservationTableSeeder::class,
            RefereeTableSeeder::class,
            FootballMatchRefereeTableSeeder::class,
            
            
            
            
            

        ]);
    }
}
