<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filme extends Model
{
    use HasFactory;

    protected $table = 'filmes';

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'nome',
        'genero',
        'diretor',
        'ano',
        'created_by',
    ];

    // Relacionamento com o modelo Genero
    public function genero()
    {
        return $this->belongsTo(Genero::class, 'genero');
    }

    // Relacionamento com o modelo Diretor
    public function diretor()
    {
        return $this->belongsTo(Diretor::class, 'diretor');
    }
}



