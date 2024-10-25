<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    use HasFactory;

    protected $table = 'transacoes'; // Nome da tabela

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'usuario_id', 'tipo', 'valor', 'data', 'categoria', 'descricao'
    ];
}
