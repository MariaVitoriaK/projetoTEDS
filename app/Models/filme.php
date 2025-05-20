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
}



