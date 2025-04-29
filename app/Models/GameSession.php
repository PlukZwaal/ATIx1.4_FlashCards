<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'deck_id',
        'user_id',
        'correct',
        'wrong',
        'correct_answers',
        'incorrect_answers',
    ];

    protected $casts = [
        'correct_answers' => 'array', 
        'incorrect_answers' => 'array', 
    ];

}