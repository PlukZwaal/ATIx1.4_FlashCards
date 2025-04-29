<?php

namespace App\Livewire\Decks;

use Livewire\Component;
use App\Models\Deck;
use App\Models\GameSession;

class Game extends Component
{
    public Deck $deck;
    public int $index = 0;
    public bool $flipped = false;
    public int $correct = 0;
    public int $wrong = 0;
    public bool $finished = false;
    public GameSession $gameSession; 

    public function mount()
    {
        $this->gameSession = GameSession::create([
            'deck_id' => $this->deck->id,
            'user_id' => auth()->id(), 
            'correct' => 0,
            'wrong' => 0,
            'correct_answers' => json_encode([]), 
            'incorrect_answers' => json_encode([]), 
        ]);
    }

    public function flip()
    {
        $this->flipped = !$this->flipped;
    }

    public function answer(bool $wasCorrect)
    {
        if ($wasCorrect) {
            $this->correct++;
            $correctAnswers = json_decode($this->gameSession->correct_answers, true);
            $correctAnswers[] = $this->deck->cards[$this->index]->id; 
            $this->gameSession->correct_answers = json_encode($correctAnswers);
        } else {
            $this->wrong++;
            $incorrectAnswers = json_decode($this->gameSession->incorrect_answers, true);
            $incorrectAnswers[] = $this->deck->cards[$this->index]->id; 
            $this->gameSession->incorrect_answers = json_encode($incorrectAnswers);
        }

        $this->gameSession->correct = $this->correct;
        $this->gameSession->wrong = $this->wrong;
        $this->gameSession->save();

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
            'gameSession' => $this->gameSession, 
        ]);
    }
    
}
