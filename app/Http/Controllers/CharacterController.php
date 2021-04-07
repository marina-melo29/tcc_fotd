<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tb_Personagem;
use App\Models\Tb_Racas;
use App\Models\Tb_Classe;
use App\Models\Tb_Atributos;
use App\Models\Tb_Alinhamentos;
use App\Models\Tb_Armaduras;
use App\Models\User;
use App\Models\Tb_Personagem_talentos;

class CharacterController extends Controller
{
    public function index()
    {   
        $user_id = Auth::id();
        $character_id = Tb_Personagem::where('id_usuario',$user_id);
        return view('ficha/historico');
    }

    public function create()
    {
        $user_id = Auth::id();
        $dataCharacter = 
        [
            "id_usuario"        => $user_id,
            "nm_personagem"     => "Nome do Personagem",
            "nivel"             => 1,
            "percepcao_passiva" => 0,
            "iniciativa"        => 0,
            "bonus_proficiencia"=> 2,
            "pontos_de_vida"    => 20,
            "inspiracao"        => 0
        ];

         $create = Tb_Personagem::create($dataCharacter);
        return redirect()->route('user.get.ficha', ['id_personagem' => $create->id]);
    }

    public function update(Request $request){
        $character_id       = request()->route()->parameters['id_personagem'];
        $character          = Tb_Personagem::where('id',$character_id)->first(); 

        $character_new_data = [
            "nm_personagem"         => $request->nome_personagem,
            "id_raca"               => $request->raca,
            "id_classe"             => $request->classe,
            "id_alinhamento"        => $request->alinhamento,
            "percepcao_passiva"     => $request->pp,
            "bonus_proficiencia"    => $request->bp,
            "nivel"                 => $request->nivel,
            "iniciativa"            => $request->iniciativa,
            "pontos_de_vida"        => $request->vida,
            "pontos_de_vida_atual"  => $request->vida_atual,
            "classe_de_armadura"    => $request->ca,
            "deslocamento"          => $request->deslocamento,
            "inspiracao"            => $request->insp,
            "outras_proficiencias"  => $request->outras_prof,


        ];
        
        $character->update($character_new_data);
        return redirect()->route('historico');
    }

    public function response(Request $request)
    {   
        if($request->character_name != ''){
            $teste['success'] = true;
            $teste['message'] = "Sim";

            echo json_encode($teste);
            return;
        }else{ 
            $teste['success'] = false;
            $teste['message'] = "sim";

            echo json_encode($teste);
            return;
        }        
        
    }

    public function getEditor()
    {
        $character_id = request()->route()->parameters['id_personagem'];
        $racas = Tb_Racas::all();
        $classes = Tb_Classe::all();
        $user_id = Auth::id();
        $align   = Tb_Alinhamentos::all();

        $character = $this->ShowCharacterDataById($user_id,$character_id);  
        return view('ficha/ficha',["personagem"=>$character, "racas"=>$racas, "classes"=>$classes,"alinhamento"=>$align]);    
    }


    public function ShowCharacterDataById($user_id,$character_id)
    {
        $character_data = Tb_Personagem::where([['id_usuario',$user_id],['id',$character_id]])->first();        
        $character = []; 

        $character["id"]          = $character_id;
        $character["nome"]        = $character_data->nm_personagem;
        $character["raca"]        = Tb_Racas::where('id_raca',$character_data->id_raca)->first();
        $character["classe"]      = Tb_Classe::where('id_classe',$character_data->id_classe)->first();
        $character["nivel"]       = $character_data->nivel;
        $character["pv"]          = $character_data->pontos_de_vida;
        $character["pv_atual"]    = $character_data->pontos_de_vida_atual;
        $character["pp"]          = $character_data->percepcao_passiva;
        $character["bp"]          = $character_data->bonus_proficiencia; 
        $character["alinhamento"] = Tb_Alinhamentos::where('id',$character_data->id_alinhamento)->first();;
        $character["antecedente"] = $character_data->nm_antecedente;
        $character["iniciativa"]  = $character_data->iniciativa;  
        $character["deslocamento"]= $character_data->deslocamento;   
        $character["outras_prof"] = $character_data->outras_proficiencias;
        $character["inspiracao"]  = $character_data->inspiracao;
        $character["caract_e_talentos"]  = $character_data->outras_caracteristicas; 


        $talents   = Tb_Personagem_Talentos::where('id_personagem',$character_id)->get();
        $atributos = Tb_Atributos::where('id_personagem',$character_id)->first();

        //Atributos
        $character["atributos"]['forca']        = $atributos['forca'];
        $character["atributos"]['constituicao'] = $atributos['constituicao'];
        $character["atributos"]['destreza']     = $atributos['destreza'];
        $character["atributos"]['inteligencia'] = $atributos['inteligencia'];
        $character["atributos"]['sabedoria']    = $atributos['sabedoria'];
        $character["atributos"]['carisma']      = $atributos['carisma'];

        //Talentos
        for($j=0; $j < count($talents) ; $j++)
        {
            $character["talentos"][$j] = $talents[$j];
        }                  

       return $character;
    }


}
