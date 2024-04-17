<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $roles = Role::whereIn('name', ['user', 'journalist'])->pluck('id')->toArray();

        $users->each(function ($user) use ($roles) {
            $user->roles()->attach($roles[array_rand($roles)]);
        }); 
    }
}
