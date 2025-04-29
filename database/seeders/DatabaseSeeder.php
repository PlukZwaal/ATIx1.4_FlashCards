<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; 
use Database\Seeders\DeckSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Pluk',
            'email' => 'plukky.zwaal@gmail.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Pluk2',
            'email' => 'plukky.zwaal2@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $this->call(DeckSeeder::class);
    }
}
