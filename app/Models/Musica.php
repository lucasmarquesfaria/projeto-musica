<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    use HasFactory;
    protected $table = 'musicas';

    protected $fillable = [
        'id',
        'titulo',
        'id_usuario',
        'genero',
        'data_upload',
        'artista'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario','id_usuario', 'id');
    }

}


