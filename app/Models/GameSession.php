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

    public function deck()
    {
        return $this->belongsTo(\App\Models\Deck::class);
    }

    public function getCorrectAnswersAttribute($value)
    {
        return json_decode($value, true); // Zet de string om naar een array
    }

    public function getIncorrectAnswersAttribute($value)
    {
        return json_decode($value, true); // Zet de string om naar een array
    }
}
