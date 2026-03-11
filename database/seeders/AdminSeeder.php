<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'SuperAdmin@example.com',
            'password' => Hash::make('BeyondTechNepal123'),
            'role' => 'super_admin',
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'Himaida@example.com',
            'password' => Hash::make('HimaidaNepal@123'),
            'role' => 'admin',
        ]);
    }
}
