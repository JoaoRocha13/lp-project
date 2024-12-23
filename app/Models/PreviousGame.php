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
        'jogo_id',
        'time_a',
        'time_b',
        'placar_a',
        'placar_b',
        'data',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }
}