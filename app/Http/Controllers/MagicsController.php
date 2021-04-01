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
        
        #requests
        $name  = $request->pesquisa_magia; 
        $level = $request->nivel; 
        $class = $request->classe; 

        #Call magics function
        $magic_table = new Tb_Magias();
        $magic       = $magic_table->getMagic($name, $level, $class);
        
        #Call spellcasters function
        $spellcasters = $magic_table->getSearchedMagic($magic);

        #Get all classes
        $classes      = Tb_Classe::all();    
        
        
        //return view("magias",['magias'=>$magic, 'conjuradores'=>$spellcasters, 'classes'=>$classes]);
    }

}
