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
use App\Models\Tb_Pericias;
use App\Models\Tb_Personagem_Pericias;
use App\Models\Tb_Personagem_Talentos;

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
        $data_Character = 
        [
            "id_usuario"        => $user_id,
            "nm_personagem"     => "Nome do Personagem",
            "nivel"             => 1,
            "percepcao_passiva" => 9,
            "iniciativa"        => 0,
            "bonus_proficiencia"=> 2,
            "pontos_de_vida"    => 20,
            "inspiracao"        => 0,
            "classe_de_armadura"=> 12,
            "outras_caracteristicas" => " "
        ];

        $create = Tb_Personagem::create($data_Character);

        $data_atributtes =
        [
            'id_personagem'         => $create->id,
            'forca'                 => 17,
            'destreza'              => 14,
            'constituicao'          => 18,
            'inteligencia'          => 11,
            'sabedoria'             => 11,
            'carisma'               => 13
        ];

        $character_expertise = [];

         
        $create_atributtes = Tb_Atributos::create($data_atributtes);
        return redirect()->route('user.get.ficha', ['id_personagem' => $create->id]);
    }

    public function update($request){
        $character_id           = request()->route()->parameters['id_personagem'];
        $character              = Tb_Personagem::where('id',$character_id)->first(); 
        $character_atributtes   = Tb_Atributos::where('id_personagem',$character_id)->first();
        $character_expertises   = Tb_Personagem_Pericias::where('id_personagem',$character_id)->get();
        $expertises_new_data = [];

        if($request->pericias != null)
        {
            #Entra aqui caso o usuário tiver selecionado perícias

            foreach ($request->pericias as $value) {
                //dd($value);
                $expertises_new_data = [
                    'id_personagem' => $character_id,
                    'id_pericia'    => $value
                ];
                
            }

            if(count($character_expertises) == 0)
            {   
                                    
                Tb_Personagem_Pericias::create($expertises_new_data);
                            
            }
            else{
                Tb_Personagem_Pericias::where('id_personagem',$character_id)->delete();
                foreach ($expertises_new_data as $data) {
                    Tb_Personagem_Pericias::create($data);                
                }
                
                
            }
        }
        else 
        {
            Tb_Personagem_Pericias::where('id_personagem',$character_id)->delete();
        }
                 
               
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
            "outras_caracteristicas"=> $request->caract_e_talentos,
        ];

        $character_atributtes_new_data = [
            'forca'                 => $request->forca,
            'destreza'              => $request->dest,
            'constituicao'          => $request->const,
            'inteligencia'          => $request->int,
            'sabedoria'             => $request->sab,
            'carisma'               => $request->car
        ];
        
        
        $character->update($character_new_data);
        $character_atributtes->update($character_atributtes_new_data);
        //return redirect()->route('historico');
    }

    public function response(Request $request)
    {   
        try{
            $update = $this->update($request);
            $teste['success'] = true;
            $teste['message'] = "Success";

            echo json_encode($teste);
            return;
        }
        catch(Throwable $t){
            $teste['success'] = false;
            $teste['message'] = $t;

            echo json_encode($teste);
            return;
        }        
                       
        
    }

    public function getEditor()
    {
        $character_id = request()->route()->parameters['id_personagem'];
        $racas      = Tb_Racas::all();
        $classes    = Tb_Classe::all();
        $user_id    = Auth::id();
        $align      = Tb_Alinhamentos::all();

        $expertises_title = Tb_Pericias::select('atributo_equivalente')->groupBy('atributo_equivalente')->get();        
        $expertises       = $this->getExpertises($expertises_title,$character_id); #Pega Todas as perícias utilizadas e aglutina num array pelo título do atributo equivalente dela   
        
        
        $character = $this->ShowCharacterDataById($user_id,$character_id);  
        
        return view('ficha/ficha',["titulo_pericias"=>$expertises_title,"pericias"=>$expertises,"personagem"=>$character, "racas"=>$racas, "classes"=>$classes,"alinhamento"=>$align]);    
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
        $character["alinhamento"] = Tb_Alinhamentos::where('id',$character_data->id_alinhamento)->first();
        $character["antecedente"] = $character_data->nm_antecedente;
        $character["iniciativa"]  = $character_data->iniciativa;  
        $character["deslocamento"]= $character_data->deslocamento;   
        $character["outras_prof"] = $character_data->outras_proficiencias;
        $character["inspiracao"]  = $character_data->inspiracao;
        $character["ca"]          = $character_data->classe_de_armadura;
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


    public function getExpertises($expertises_title,$character_id){
        $expertises = [];
        $show = [];

        $class  = new Tb_Personagem_Pericias();
        $current_expertises = $class->getCharactersExpertices($character_id); #Pega as perícias atuais


        for ($i = 0; $i < count($expertises_title); $i++) { # Coloca cada grupo de perícias dentro da posição de seu atributo equivalente
            $expertises[$i] = Tb_Pericias::Where('atributo_equivalente',$expertises_title[$i]->atributo_equivalente)->get();
            
            if(count($current_expertises) != 0)
            { #Verifica se há perícias sendo utilizadas
                
                for ($j=0; $j < count($expertises[$i]); $j++) 
                { #Passa por cada perícia dentro de cada grupo
                    foreach ($current_expertises as $current) 
                    {
                        if ($expertises[$i][$j]->id_pericia == $current->id_pericia) #Verifica se a perícia atual do loop corresponde à uma das utilizadas
                        { 
                            
                            $show[$i][$j] = [
                                "id_pericia"    => $expertises[$i][$j]->id_pericia,
                                "nm_pericia"    => $expertises[$i][$j]->nm_pericia,
                                "checked"       =>true
                            ];
                            break;

                        }
                        else
                        {
                            
                            $show[$i][$j] = [
                                "id_pericia"    => $expertises[$i][$j]->id_pericia,
                                "nm_pericia"    => $expertises[$i][$j]->nm_pericia,
                                "checked"       =>false
                            ];

                        }

                    }

                }

            }
            else 
            {
                $show[$i]  = Tb_Pericias::Where('atributo_equivalente',$expertises_title[$i]->atributo_equivalente)->get();
            }

        }       
        
        return $show;
    }


}
