<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tb_Personagem;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Resources\CharacterResource;

class CharacterController extends Controller
{
    public function index()
    {   
        $user_id = Auth::id();
        return view('ficha/historico', compact('user_id'));
    }

    public function show($id)
    {
        $character_data = Tb_Personagem::all();
        $user    = User::all();

        //$character  = Tb_Personagem::where('id_usuario',$user->id)->first();

        //return view('ficha/ficha',["character"=>$character->id]);
        return route("");
    }

}
