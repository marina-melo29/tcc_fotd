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
        $classe         = new Tb_Magias();
        $spellcasters   = $classe->getSpellcasters();
        //$user_id        = Auth::user();
        $magics         = Tb_Magias::paginate(12);
        $classes        = Tb_Classe::all();
        return $this->getMagics($magics, $spellcasters,$classes);        
    }

    public function getMagics($magics, $spellcasters,$classes){
        return view("magias",['magias'=>$magics, 'conjuradores'=>$spellcasters,'classes'=>$classes]);
    }

    // public function response(Request $request)
    // {   

    //     try{


    //         //$update = $this->getMagic($request);
    //         #requests
    //         $name  = $request->pesquisa_magia; 
    //         $level = $request->nivel; 
    //         $classe = $request->classe; 

    //         #Call magics function
    //         $magic_table = new Tb_Magias();
    //         $magic       = $magic_table->getMagic($name, $level, $classe);
            
    //         #Call spellcasters function
    //         $spellcasters = $magic_table->getSearchedMagic($magic);

    //         #Get all classes
    //         $classes      = Tb_Classe::all();  

    //         $teste['success'] = true;                
    //         $teste['magias'] = $magic;
    //         $teste['conjuradores'] = $spellcasters;
    //         //$teste['classes'] = $classes;
            
    //         echo json_encode($teste);
    //         return;
            
    //     }
    //     catch(Throwable $t){
    //         $teste['success'] = false;  
    //         $teste['message'] = $t;

    //         echo json_encode($teste);
    //         return;
    //     }
        
    // }

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
        
        
        return view("magias",['magias'=>$magic, 'conjuradores'=>$spellcasters, 'classes'=>$classes]);

    }



}
