<?php

namespace App\Livewire\Game;

use Livewire\Component;
use App\Models\GameSession;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;

class Sessions extends Component
{
    public function render()
    {
        $sessions = GameSession::where('user_id', Auth::id())
        ->with('deck')
        ->orderBy('created_at', 'desc') 
        ->get()
        ->map(function ($session) {
            $correct = Card::whereIn('id', json_decode($session->correct_answers))->get();
            $incorrect = Card::whereIn('id', json_decode($session->incorrect_answers))->get();

            $total = $correct->count() + $incorrect->count();
            $percentage = $total > 0 ? round(($correct->count() / $total) * 100) : 0;

            $session->correct_cards = $correct;
            $session->incorrect_cards = $incorrect;
            $session->correct_percentage = $percentage;

            return $session;
        });

        return view('livewire.game.sessions', compact('sessions'));
    }
}
