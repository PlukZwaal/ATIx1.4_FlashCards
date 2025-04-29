<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Decks\Create;
use App\Livewire\Decks\Show;
use Livewire\Livewire;
use App\Http\Controllers\DeckController;
use App\Http\Controllers\GameController;

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::redirect('/', '/dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
    
    Route::get('/decks/{deck}', [DeckController::class, 'show'])->name('decks.show');
    Route::get('/decks/{deck}/game', [GameController::class, 'show'])->name('decks.game');

    

require __DIR__.'/auth.php';
