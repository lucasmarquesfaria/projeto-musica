<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MembrosProjeto extends Model
{
    use HasFactory;

    protected $table = 'membrosprojeto';

    protected $fillable = [

        'id',
        'id_projeto',
        'id_usuario',
        'funcao',
    ];

    public function usuario() {
        return $this->BelongsTo('App\Models\Usuario','id_usuario','id');
    }

    public function projeto() {
        return $this->BelongsTo('App\Models\ProjetoMusical','id_projeto','id');
    }
}
