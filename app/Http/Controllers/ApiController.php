<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use App\Models\Deck;
use App\Models\Card;
use App\Models\GameSession; 
use App\Models\User;

class ApiController extends Controller
{
    public function getAllUsers(): JsonResponse
    {
        $users = User::all();
        foreach ($users as $user) {
            $decksCount = Deck::where('user_id', $user->id)->count();
            $cardsCount = 0;
            $decks = Deck::where('user_id', $user->id)->get();
            foreach ($decks as $deck) {
                $cardsCount += Card::where('deck_id', $deck->id)->count();
            }
            $sessionsCount = GameSession::where('user_id', $user->id)->count();
            $user->decks_count = $decksCount;
            $user->cards_count = $cardsCount;
            $user->sessions_count = $sessionsCount;
        }
        return response()->json($users);
    }

    public function getAllDecks(): JsonResponse
    {
        return response()->json(DB::table('decks')->get());
    }

    public function getAllCards(): JsonResponse
    {
        return response()->json(DB::table('cards')->get());
    }

    public function getAllGameSessions(): JsonResponse
    {
        return response()->json(DB::table('game_sessions')->get());
    }
}