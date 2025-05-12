<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    public function getAllUsers(): JsonResponse
    {
        return response()->json(DB::table('users')->get());
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