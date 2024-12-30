<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviousGame extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'game_id',
        'team_a',
        'team_b',
        'score_a',
        'score_b',
        'game_date',
        'local', // Adicionado
        'ticket_price', // Adicionado
        'tickets_available', // Adicionado
        'team_a_logo', // Adicionado
        'team_b_logo', // Adicionado
    ];

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }
}