<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class FaturaProducts extends Model
    {
        use HasFactory;

        protected $fillable = ['fatura_id', 'product_id', 'quantity', 'price'];

    }

?>