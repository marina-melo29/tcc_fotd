<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Tb_Personagem;
use App\Models\Tb_Racas;
use App\Models\Tb_Classe;
use App\Models\User;
use App\Models\Tb_Personagem_Talentos;
use App\Models\Tb_Atributos;
use Illuminate\Http\Request;

class CharacterHistoricController extends Controller
{
    public function index()
    {   
        $user_id = Auth::id();     
        
        $characters = $this->ShowCharactersData($user_id);
        return view('ficha\historico_ficha',["personagens"=>$characters]);
    }

    public function destroy(){
        $character_id  = request()->route()->parameters['id_personagem'];
         
        try{
            if(Tb_Personagem::where('id',$character_id)->first()){                
                if (Tb_Atributos::Where('id_personagem',$character_id)->first()) {
                    Tb_Atributos::Where('id_personagem',$character_id)->first()->delete();
                }
                if(Tb_Personagem_Talentos::where('id',$character_id)->first()){
                    Tb_Personagem_Talentos::where('id',$character_id)->first()->delete();
                }
                Tb_Personagem::where('id',$character_id)->first()->delete();
                
            }
            else{
                echo "<script>alert('oi')</script>";
            } 
        }
        catch(Throwable $t){
            echo "<script>console.log($t)</script>";
        }
        return redirect()->route('historico');
        
    }

    public function ShowCharactersData($user_id){
        $characters_data = Tb_Personagem::where('id_usuario',$user_id)->get();
        $characters = []; 
        for ($i=0; $i < count($characters_data) ; $i++) { 
            $characters[$i]["id"]     = $characters_data[$i]->id;
            $characters[$i]["nome"]   = $characters_data[$i]->nm_personagem;
            $characters[$i]["raca"]   = Tb_Racas::where('id_raca',$characters_data[$i]->id_raca)->first();
            $characters[$i]["classe"] = Tb_Classe::where('id_classe',$characters_data[$i]->id_classe)->first();
            $characters[$i]["nivel"]  = $characters_data[$i]->nivel;
        }        
        return $characters;
    }

    
}
