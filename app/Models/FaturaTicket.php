<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class FaturaTicket extends Model
    {
        use HasFactory;

        protected $fillable = ['order_id', 'ticket_id', 'quantity', 'price'];

    }

?>