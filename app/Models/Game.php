<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Game extends Model
    {
        use HasFactory;

        protected $table = 'games';
        protected $fillable = [
            'team_a',
            'team_b',
            'game_date',
            'local',
            'ticket_price',
            'tickets_available'
            
        ];

        public function tickets()
        {
            return $this->hasMany(Ticket::class, 'game_id');
        }

        
    }   

?>