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

    public function getSearchedMagic($magic)
    {        
        $spellcasters = $magic->id_magia;
        echo $magic;
    }    

    public function getMagic($name, $level, $class){
        $magic = Tb_Magias::paginate(12);
        
        if($name != '')
        { # Aqui o usuário digitou o nome da magia

            $magic = Tb_Magias::Where('nm_magia','LIKE',"%".ucfirst($name)."%")->get();
        }
        else
        { # Não digitou nome da magia
            
            if($level != "%all_items%" && $class == "%all_items%")
            { # Usuário selecionou um level em específico apenas

                $magic = Tb_Magias::Where('nivel_magia',$level)->paginate(12);
            }

            if($level == "%all_items%" && $class != "%all_items%")
            { # Usuário selecionou uma classe em específico apenas                
                
                /*$magic = Tb_Classe_Magias::join('Tb_Classe_Magias', 'Tb_Classe_Magias.id_magia', '=', 'Tb_Magias.id_magia')
                ->where('Tb_Classe_Magias.id_classe', 2)
                ->get();*/ #Join não utilizado
                $classe_magias = Tb_Classe_Magias::select('id_magia')->where('id_classe',$class)->get();
                $magic = Tb_Magias::WhereIn('id_magia',$classe_magias)->get();
            }

            if($level != "%all_items%" && $class != "%all_items%")
            { # Usuário selecionou um level e uma classe
                
                $magic = Tb_Magias::Where('nivel_magia',$level,'and','id_classe',$class)->paginate(12);
            }            

        }

        return $magic;

    }
    
}
