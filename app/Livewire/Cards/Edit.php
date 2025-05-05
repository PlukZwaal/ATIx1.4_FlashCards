<?php

namespace App\Livewire\Cards;

use Livewire\Component;
use App\Models\Card;

class Edit extends Component
{
    public $card;
    public $front;
    public $back;

    public function mount(Card $card)
    {
        $this->card = $card;
        $this->front = $card->front;
        $this->back = $card->back;
    }

    public function update()
    {
        $this->validate([
            'front' => 'required|string|max:255',
            'back' => 'required|string|max:255',
        ]);

        $this->card->update([
            'front' => $this->front,
            'back' => $this->back,
        ]);

        session()->flash('success', 'Kaart succesvol bijgewerkt!');
    }

    public function render()
    {
        return view('livewire.cards.edit');
    }
}
