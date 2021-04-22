<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_Personagem_Pericias extends Model
{
    protected $table = 'tb_personagem_pericias';

    protected $fillable = [
        'id_personagem',
        'id_pericia'
    ];

    public $timestamps = false;

    public function getCharactersExpertices($character_id){
        $expertices_ids  = Tb_Personagem_Pericias::select('id_pericia')->where('id_personagem',$character_id)->get();
        $expertices_data = Tb_Pericias::whereIn('id_pericia',$expertices_ids)->get();

        return $expertices_data;
    }
}
