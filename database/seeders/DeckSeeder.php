<?php

namespace Database\Seeders;

use App\Models\Deck;
use App\Models\Card;
use Illuminate\Database\Seeder;

class DeckSeeder extends Seeder
{
    public function run(): void
    {
        Deck::factory()
            ->count(25)
            ->create()
            ->each(function ($deck) {
                Card::factory()
                    ->count(rand(0, 15))
                    ->for($deck)
                    ->create();
            });
    }
}
