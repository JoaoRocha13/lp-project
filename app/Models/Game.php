<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Game extends Model
    {
        use HasFactory;

        protected $fillable = ['name', 'game_date', 'location'];

        /*public function faturas()
        {
            return $this->belongsToMany(Fatura::class)->withPivot('quantity', 'price');
        }*/ 

    }   

?>