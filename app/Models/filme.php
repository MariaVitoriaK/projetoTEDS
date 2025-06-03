<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;

    protected $table = 'filmes';

    protected $fillable = [
        'nome',
        'genero_id',
        'diretor_id',
        'ano',
        'created_by',
    ];

    public function genero()
    {
        return $this->belongsTo(Genero::class, 'genero_id');
    }

    public function diretor()
    {
        return $this->belongsTo(Diretor::class, 'diretor_id');
    }
}
