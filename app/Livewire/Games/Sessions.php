<?php

namespace App\Livewire\Game;

use Livewire\Component;
use App\Models\GameSession;

class Sessions extends Component
{

    public function render()
    {
        return view('livewire.games.sessions');
    }

}
