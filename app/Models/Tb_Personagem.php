<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_Personagem extends Model
{
    protected $table = 'tb_personagem';

    protected $fillable = [
        'id_usuario',
        'nm_personagem',
        'id_raca',
        'id_classe',
        'nm_antecedente',
        'nivel',
        'percepcao_passiva',
        'id_alinhamento',
        'bonus_proficiencia', 
        'iniciativa',
        'pontos_de_vida',
        'pontos_de_vida_atual',
        'classe_de_armadura',
        'inspiracao',
        'outras_proficiencias',
        'deslocamento',
        'outras_caracteristicas'

    ];

    public $timestamps = false;
}
