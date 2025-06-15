<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;

    // Nome da Tabela
    protected $table = 'filmes';

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'nome',
        'genero_id',
        'diretor_id',
        'ano',
        'created_by',
    ];


    // Relacionamento: um Filme pertence a um Gênero
    public function genero()
    {
        return $this->belongsTo(Genero::class, 'genero_id');
    }

    // Relacionamento: um Filme pertence a um Diretor
    public function diretor()
    {
        return $this->belongsTo(Diretor::class, 'diretor_id');
    }
}
