<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'user 1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
