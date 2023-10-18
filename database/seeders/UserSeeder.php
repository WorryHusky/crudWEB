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
            'name' => 'tyok',
            'email' => 'admin@gmal.com',
            'role' => 'admin',
            'password' => Hash::make('admin123'), 
        ]);

        User::create([
            'name' => 'Musthofa',
            'email' => 'user@gmail.com',
            'role' => 'user',
            'password' => Hash::make('user123'), 
        ]);
    }
}
