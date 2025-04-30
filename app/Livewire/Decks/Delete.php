<?php

namespace App\Livewire\Decks;

use Livewire\Component;
use App\Models\Deck;
use App\Models\Card;
use App\Models\GameSession;  // Voeg dit toe om sessies op te halen
use Illuminate\Support\Facades\Auth;

class Delete extends Component
{
    public $deck;
    public bool $showModal = false;

    public function mount($deckId)
    {
        $this->deck = Deck::findOrFail($deckId);
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function deleteDeck()
    {
        GameSession::where('deck_id', $this->deck->id)->delete();
        
        $this->deck->cards()->delete(); 
        
        $this->deck->delete();
    
        $this->showModal = false;
        session()->flash('success', 'Deck, cards, and associated sessions successfully deleted!');
    
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.decks.delete');
    }
}
