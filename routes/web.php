<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Decks\Create;
use App\Livewire\Decks\Show;
use Livewire\Livewire;
use App\Http\Controllers\DeckController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ApiController;

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::redirect('/', '/dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::view('/sessions', 'sessions')
    ->middleware(['auth', 'verified'])
    ->name('sessions');
    
Route::get('/decks/{deck}', [DeckController::class, 'show'])->name('decks.show');
Route::get('/decks/{deck}/game', [GameController::class, 'show'])->name('decks.game');




Route::get('/api/users', [ApiController::class, 'getAllUsers']);
Route::get('/api/decks', [ApiController::class, 'getAllDecks']);
Route::get('/api/cards', [ApiController::class, 'getAllCards']);
Route::get('/api/game_sessions', [ApiController::class, 'getAllGameSessions']);

    

require __DIR__.'/auth.php';
