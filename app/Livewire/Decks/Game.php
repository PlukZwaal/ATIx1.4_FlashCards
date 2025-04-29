<?php

namespace App\Livewire\Decks;

use Livewire\Component;
use App\Models\Deck;

class Game extends Component
{
    public Deck $deck;
    public int $index = 0;
    public bool $flipped = false;
    public int $correct = 0;
    public int $wrong = 0;
    public bool $finished = false;

    public function flip()
    {
        $this->flipped = !$this->flipped;
    }

    public function answer(bool $wasCorrect)
    {
        if ($wasCorrect) $this->correct++;
        else $this->wrong++;

        $this->index++;
        $this->flipped = false;

        if ($this->index >= $this->deck->cards->count()) {
            $this->finished = true;
        }
    }

    public function render()
    {
        return view('livewire.decks.game', [
            'card' => $this->deck->cards[$this->index] ?? null,
        ]);
    }
}
