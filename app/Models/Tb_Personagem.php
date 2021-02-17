<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_Personagem extends Model
{
    protected $table = 'tb_personagem';

    protected $fillable = [
        'id_usuario','nm_personagem','nivel','percepcao_passiva','iniciativa','bonus_proficiencia'
    ];

    public $timestamps = false;
}
