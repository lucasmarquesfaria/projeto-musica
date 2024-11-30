<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuarios';

    protected $fillable = [
        'id',
        'nome',
        'nome_usuario',
        'senha',
        'foto_perfil',
        'descricao'

    ];
   
}
