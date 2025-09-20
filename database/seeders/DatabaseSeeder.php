<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'fullname' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@pkuwsb.id',
            'password' => Hash::make('KataSandi123'),
            'role' => 'admin',
            // 'secret_key' => 'MySecretKey'
        ]);


        User::create([
            'fullname' => 'Staff Satu',
            'username' => 'staff.satu',
            'email' => 'staffsatu@pkuwsb.id',
            'password' => Hash::make('KataSandi456'),
            'role' => 'staff',
            // 'secret_key' => 'MySecretKey'
        ]);
    }
}
