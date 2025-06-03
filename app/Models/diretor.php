<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diretor extends Model
{
    use HasFactory;

    protected $table = 'diretores';

    protected $fillable = [
        'nome',
        'nacionalidade',
        'created_by',
    ];
}

