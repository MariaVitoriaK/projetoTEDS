<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genero extends Model
{
    use HasFactory;

    // Nome da Tabela
    protected $table = 'generos';

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'nome',
        'created_by',
    ];
}



