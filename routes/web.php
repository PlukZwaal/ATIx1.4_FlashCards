<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Decks\Create;
use App\Livewire\Decks\Show;
use Livewire\Livewire;
use App\Http\Controllers\DeckController;

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::redirect('/', '/dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
    
    Route::get('/decks/{deck}', [DeckController::class, 'show'])->name('decks.show');

    

require __DIR__.'/auth.php';
