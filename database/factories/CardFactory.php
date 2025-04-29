<?php

namespace Database\Factories;

use App\Models\Deck;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    public function definition(): array
    {
        return [
            'front' => $this->faker->sentence(),
            'back' => $this->faker->sentence(),
            'deck_id' => Deck::inRandomOrder()->first()?->id ?? 1,
        ];
    }
}
