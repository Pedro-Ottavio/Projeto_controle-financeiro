<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaFinanceira extends Model
{
    use HasFactory;

    protected $table = 'metas_financeiras'; // Nome da tabela

    protected $fillable = [
        'usuario_id', 'tipo_meta', 'valor_meta', 'status'
    ];
}
