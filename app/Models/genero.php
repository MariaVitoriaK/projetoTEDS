<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genero extends Model
{
    use HasFactory;

    protected $table = 'generos';

    protected $fillable = [
        'nome',
        'created_by',
    ];
}



