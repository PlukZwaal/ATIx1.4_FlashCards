<?php

namespace App\Livewire\Decks;

use Livewire\Component;
use App\Models\Deck;
use Illuminate\Support\Facades\Auth;

class Update extends Component
{
    public $deckId;
    public $title;
    public bool $showModal = false;

    protected $rules = [
        'title' => 'required|min:3|max:255'
    ];

    // Laad het deck op basis van het id
    public function mount($deckId)
    {
        $this->deckId = $deckId;
        $deck = Deck::findOrFail($deckId);
        $this->title = $deck->title;
    }

    public function openModal()
    {
        $this->resetErrorBag();
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        // Werk het deck bij
        $deck = Deck::findOrFail($this->deckId);
        $deck->update([
            'title' => $this->title,
        ]);

        $this->dispatch('deck-updated');

        $this->showModal = false;
        session()->flash('success', 'Deck succesvol bijgewerkt!');
    }

    public function render()
    {
        return view('livewire.decks.update');
    }
}