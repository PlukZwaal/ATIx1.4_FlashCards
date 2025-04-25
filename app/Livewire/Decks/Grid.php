<?php

namespace App\Livewire\Decks;

use Livewire\Component;
use App\Models\Deck;

class Grid extends Component
{
    protected $listeners = ['deck-created' => '$refresh']; 

    public function render()
    {
        return view('livewire.decks.grid', [
            'decks' => Deck::latest()->get()
        ]);
    }
}
