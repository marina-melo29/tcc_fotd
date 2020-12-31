<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tb_Personagem;
use App\Models\User;
use App\Http\Resources\CharacterResource;

class CharacterController extends Controller
{
    public function index()
    {   
        return view('ficha/ficha');
    }

    public function show($id)
    {
        $character = new Tb_Personagem;
        return new CharacterResource($character->find($id));
    }

}
