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
        'team_a',
        'team_b',
        'team_a_logo',
        'team_b_logo',
        'score_a',
        'score_b',
        'game_date',
    ];
}