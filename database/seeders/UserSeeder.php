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
        User::create([
            'name' => 'user1',
            'username' => 'user1',
            'email' => 'user1@example.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => 'user2',
            'username' => 'user2',
            'email' => 'user2@example.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => 'user3',
            'username' => 'user3',
            'email' => 'user3@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
