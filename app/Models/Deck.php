<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    use HasFactory;

    /**
     * De velden die mass assignable zijn
     * 
     * @var array
     */
    protected $fillable = [
        'title',
        'user_id'
    ];

    /**
     * Relatie met de gebruiker
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}