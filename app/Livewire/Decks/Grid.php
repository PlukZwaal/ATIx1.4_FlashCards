<?php

namespace App\Livewire\Decks;

use Livewire\Component;
use App\Models\Deck;
use Illuminate\Support\Facades\Auth;

class Grid extends Component
{
    protected $listeners = ['deck-created' => '$refresh']; 

    public function render()
    {
        return view('livewire.decks.grid', [
            'decks' => Deck::withCount('cards')  
                            ->where('user_id', Auth::id())
                            ->latest()
                            ->get()
        ]);
    }
}