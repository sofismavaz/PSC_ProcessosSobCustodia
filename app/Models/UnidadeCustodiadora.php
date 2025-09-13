<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadeCustodiadora extends Model
{
    use HasFactory;

    protected $table = 'unidadeCustodiadora'; // Nome da tabela no banco de dados [6]
    protected $fillable = [
        'autorRegistro',
        'dataHoraRegistro',
        'unidadeCustodiadora'
    ];
    public $timestamps = false; // Desabilitar timestamps automáticos do Laravel se 'dataHoraRegistro' for manual [6]
}