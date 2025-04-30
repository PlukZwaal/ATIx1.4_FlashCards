<?php

namespace App\Livewire\Game;

use Livewire\Component;
use App\Models\GameSession;

class Sessions extends Component
{
    public function render()
    {
        $sessions = GameSession::all();

        return view('livewire.game.sessions', [
            'sessions' => $sessions
        ]);
    }
}
