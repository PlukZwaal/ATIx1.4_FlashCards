<?php

namespace App\Livewire\Cards;

use Livewire\Component;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public $front = '';
    public $back = '';
    public $deck_id;
    public $showModal = false;

    protected $rules = [
        'front' => 'required|string|max:255',
        'back' => 'required|string|max:255',
    ];

    public function save()
    {
        $this->validate();

        Card::create([
            'front' => $this->front,
            'back' => $this->back,
            'deck_id' => $this->deck_id,
        ]);

        $this->dispatch('card-created');

        $this->reset('front', 'back');
        $this->showModal = false;
        session()->flash('success', 'Card successfully created!');
    }

    public function render()
    {
        return view('livewire.cards.create');
    }
}
