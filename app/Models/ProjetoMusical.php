<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoMusical extends Model
{
    use HasFactory;

    protected $table = 'projetomusical';

    protected $fillable = [

        'id',
        'nome',
        'descricao',
    ];
}
