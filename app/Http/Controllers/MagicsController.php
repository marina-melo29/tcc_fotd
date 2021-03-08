<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use App\Models\Tb_Magias;
use App\Models\Tb_Classe;
use App\Models\Tb_Classe_Magias;

class MagicsController extends Controller
{
    public function boot()
    {
        Paginator::useBootstrap();
    }

    public function index(){
        $user_id = Auth::user();
        //$dados_magias = $this->getMagias();
        $magias = Tb_Magias::paginate(12);
        return view("magias",['usuario'=>$user_id,'magias'=>$magias]);
    }

    public function getMagias(){
        $magics_data    = Tb_Magias::orderBy('nm_magia', 'asc')->paginate(12);
        $classes        = Tb_Classe::all();
        $conjuradores   = [];
        $magias = []; 
        
        for ($i=0; $i < count($magics_data); $i++) { 
            $a = Tb_Classe_Magias::Select('id_classe')->Where('id_magia',$magics_data[$i]->id_magia)->get();

            for ($j=0; $j < count($a) ; $j++) { 
                $conjuradores= Tb_Classe::Select('nm_classe')->Where('id_classe',$a[$j]['id_classe'])->first();
                $magias[$i]["conjuradores"][$j] = $conjuradores['nm_classe'];                 
            }
            
            $magias[$i]["id"]           = $magics_data[$i]->id_magia;
            $magias[$i]["nome"]         = $magics_data[$i]->nm_magia;
            $magias[$i]["desc"]         = $magics_data[$i]->desc_magia;
            $magias[$i]["nivel"]        = $magics_data[$i]->nivel_magia;
            $magias[$i]["componentes"]  = $magics_data[$i]->componentes;
            $magias[$i]["duracao"]      = $magics_data[$i]->duracao;
            $magias[$i]["distancia"]    = $magics_data[$i]->distancia;
            $magias[$i]["duracao"]      = $magics_data[$i]->duracao;
            $magias[$i]["preparo"]      = $magics_data[$i]->tempo_de_preparo;
            $magias[$i]["escola"]       = $magics_data[$i]->escola_magia;
            $magias[$i]["qtd_conjuradores"] = count($a);
        }        
        return $magias;
    }

    public function arrumaBD()
    {
        $magics_data    = Tb_Magias::orderBy('nm_magia', 'asc')->get();
        $classes        = Tb_Classe::all();
        
        $magias = []; 
        
        
        for ($i=0; $i < count($magics_data); $i++) 
        { 
            $str_classes[$i]= "".$magics_data[$i]->nm_magia." =>  ";
            $ids_classe_magia = Tb_Classe_Magias::Select('id_classe')->Where('id_magia',$magics_data[$i]->id_magia)->get();
            
            for ($j=0; $j < count($ids_classe_magia) ; $j++) { 
                $conjuradores= Tb_Classe::Select('nm_classe')->Where('id_classe',$ids_classe_magia[$j]['id_classe'])->first();
                
                //na posição $i vai inserir uma string com as classes x,y,z
                $str_classes[$i] .= "".$conjuradores['nm_classe']; 
                if(isset($ids_classe_magia[$j+1])){
                    $str_classes[$i] .= ",";
                }
            } 
            
        }
        dd($str_classes);
        
    }  

}
