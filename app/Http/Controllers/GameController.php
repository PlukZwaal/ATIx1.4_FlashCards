<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function show(Deck $deck)
    {
        return view('game', compact('deck')); 
    }
}
