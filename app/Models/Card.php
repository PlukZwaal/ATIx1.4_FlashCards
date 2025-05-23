<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'front',
        'back',
        'deck_id',
    ];

    public function deck()
{
    return $this->belongsTo(\App\Models\Deck::class);
}
}