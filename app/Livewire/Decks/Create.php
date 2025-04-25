<?php

namespace App\Livewire\Decks;

use Livewire\Component;
use App\Models\Deck;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public string $title = '';
    public bool $showModal = false;

    protected $rules = [
        'title' => 'required|min:3|max:255'
    ];

    public function openModal()
    {
        $this->resetErrorBag();
        $this->reset('title');
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        Deck::create([
            'title' => $this->title,
            'user_id' => Auth::id()
        ]);

        $this->showModal = false;
        session()->flash('success', 'Deck succesvol aangemaakt!');
    }

    public function render()
    {
        return view('livewire.decks.create');
    }
}