<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedAtividade extends Model
{
    use HasFactory;

    protected $table = 'feedatividades';

    protected $fillable = [
        'id',
        'id_usuario',
        'atividade',
        'data_atividade'
    ];

    public function usuario() {
        return $this->belongsTo('App\Models\Usuario','id_usuario','id');
    }


}
