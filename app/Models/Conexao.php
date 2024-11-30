<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conexao extends Model
{
    use HasFactory;
    protected $table = 'conexoes';

    protected $fillable = [
        'id',
        'id_usuario1',
        'id_usuario2',
        'data_conexao',
    ];

    public function usuario1() {
        return $this->belongsTo('App\Models\Usuario', 'id_usuario1', 'id');
    }
    public function usuario2() {
        return $this->belongsTo('App\Models\Usuario', 'id_usuario2', 'id');
    }
}
