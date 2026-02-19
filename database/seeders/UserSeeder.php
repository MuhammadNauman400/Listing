<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Super Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'user_type' => 'admin',
            ],
            [
                'name' => 'John Doe',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'),
                'user_type' => 'user',
            ]
        ]);
    }
}
