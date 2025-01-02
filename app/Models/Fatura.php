<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fatura extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nome',
        'codigo_postal',
        'localidade',
        'telefone',
        'itens',
        'total',
    ];

    protected $casts = [
        'itens' => 'array', // Converte JSON para array automaticamente
    ];
}



?>