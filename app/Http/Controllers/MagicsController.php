<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use App\Models\Tb_Magias;
use App\Models\Tb_Classe;

class MagicsController extends Controller
{
    public function boot()
    {
        Paginator::useBootstrap();
    }

    public function index(){
        return $this->getMagics();        
    }

    public function getMagics(){
        $classe         = new Tb_Magias();
        $conjuradores   = $classe->getSpellcasters();
        $user_id        = Auth::user();
        $magics         = Tb_Magias::paginate(12);
        $classes        = Tb_Classe::all();
        return view("magias",['usuario'=>$user_id,'magias'=>$magics, 'conjuradores'=>$conjuradores,'classes'=>$classes]);
    }

    public function response(Request $request)
    {   
        if($request->pesquisa_magia != null && $request->pesquisa_magia != ''){
            $teste['success']  = true; 
            $teste['nm_magia'] = $request->pesquisa_magia; 
            $teste['nivel'] = $request->nivel;  
            $teste['classe'] = $request->classe; 
            $teste['ritual'] = $request->ritual; 

            echo json_encode($teste);
        }else{
            $teste['success'] = false;  
            echo json_encode($teste);          
        }
        
    }

    public function getMagic(Request $request){
        
        $filter = ['nm_magia' => $request->pesquisa_magia, 'nivel_magia' => $request->nivel, 'id_classe' => $request->classe]; 
        $query = "SELECT * FROM tb_magias";

        $nomes_filtros = ['nm_magia','nivel_magia','id_classe'];
        $filled = [];

        #Confere filtros preenchidos:
        for ($i=0; $i < count($nomes_filtros) ; $i++) { 
            if ($filter[$nomes_filtros[$i]]  != "" && $filter[$nomes_filtros[$i]]  != "%all_items%") {
                $filled[] = "".$nomes_filtros[$i]."";
            }
        }

        #Monta a Query com base nos filtros preenchidos:  
        if (isset($filled)) {
            for ($i=0; $i < count($filled); $i++) { 
                if ($i == 0) {
                    $query .= " WHERE ";
                }
                if ($i == count($filled)-1) {
                    $query .= "".$filled[$i]." = ".$filter[$filled[$i]]."";
                }
                else
                {
                    $query .= "".$filled[$i]." = ".$filter[$filled[$i]]." and ";
                }  
            }
        }      

        $teste = Tb_Magias::select($query)->get();
        
        dd($teste);
        /* $magics       = Tb_Magias::where('nm_magia','like','%'.$requested_magic_name.'%')->paginate(12);
        $tb_magia     = new Tb_Magias();             
        $classes      = Tb_Classe::all();    
        $spellcasters = $tb_magia->getSearchedMagic($requested_magic_name,$requested_level,$requested_class,$ritual_check);
        
        return view("magias",['magias'=>$magics, 'conjuradores'=>$spellcasters, 'classes'=>$classes]); */
    }

}
