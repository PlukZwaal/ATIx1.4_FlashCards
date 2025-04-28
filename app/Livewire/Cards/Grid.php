<?php

namespace App\Livewire\Cards;

use Livewire\Component;
use App\Models\Card;

class Grid extends Component
{
    public $deckId;
    public $cards;

    protected $listeners = ['card-created' => 'loadCards'];

    public function mount()
    {
        $this->loadCards();
    }

    public function loadCards()
    {
        $this->cards = Card::where('deck_id', $this->deckId)
                           ->orderBy('updated_at', 'desc')  
                           ->get();
    }

    public function render()
    {
        return view('livewire.cards.grid');
    }
}
