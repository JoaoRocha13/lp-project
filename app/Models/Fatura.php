<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Fatura extends Model
    {
        use HasFactory;

        protected $fillable = ['user_id', 'status', 'type', 'total_price'];
    }

?>