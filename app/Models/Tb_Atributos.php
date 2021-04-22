<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_Atributos extends Model
{
    protected $table = 'tb_atributos';

    protected $fillable = [
        'id_personagem',
        'forca',
        'destreza',
        'constituicao',
        'inteligencia',
        'sabedoria',
        'carisma'
    ];

    public $timestamps = false;
}
