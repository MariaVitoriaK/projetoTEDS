<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diretor extends Model
{
    use HasFactory;

    // Nome da tabela
    protected $table = 'diretores';

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'nome',
        'nacionalidade',
        'created_by',
    ];
}

