<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_Magias extends Model
{
    protected $table = 'tb_magias';

    public function getSpellcasters()
    {        
        $magics_data = Tb_Magias::all();
        $spellcasters   = [];
        for ($i=0; $i < count($magics_data); $i++) { 
            $spellcasters[$magics_data[$i]->id_magia] = '';
            $classe_magias = Tb_Classe_Magias::Select('id_classe')->Where('id_magia',$magics_data[$i]->id_magia)->get();
            for ($j=0; $j < count($classe_magias) ; $j++) { 
                $class_name= Tb_Classe::Select('nm_classe')->Where('id_classe',$classe_magias[$j]['id_classe'])->first();
                if($j==0)
                    $spellcasters[$magics_data[$i]->id_magia] = $class_name['nm_classe'];                 
                else
                    $spellcasters[$magics_data[$i]->id_magia] = $spellcasters[$magics_data[$i]->id_magia] . ', ' . $class_name['nm_classe'];                 
            }
        }
        return $spellcasters;
    }

    public function getSearchedMagic($magic,$level,$class,$ritual)
    {        
        $magics_data = Tb_Magias::where('nm_magia','like','%'.$magic.'%')->paginate(12);
        $spellcasters   = [];
        for ($i=0; $i < count($magics_data); $i++) { 
            $spellcasters[$magics_data[$i]->id_magia] = '';
            $classe_magias = Tb_Classe_Magias::Select('id_classe')->Where('id_magia',$magics_data[$i]->id_magia)->get();
            for ($j=0; $j < count($classe_magias) ; $j++) { 
                $class_name= Tb_Classe::Select('nm_classe')->Where('id_classe',$classe_magias[$j]['id_classe'])->first();
                if($j==0)
                    $spellcasters[$magics_data[$i]->id_magia] = $class_name['nm_classe'];                 
                else
                    $spellcasters[$magics_data[$i]->id_magia] = $spellcasters[$magics_data[$i]->id_magia] . ', ' . $class_name['nm_classe'];                 
            }
        }
        return $spellcasters;
    }
    
}
