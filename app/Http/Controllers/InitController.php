<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Api\AuthController;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;

class InitController extends Controller
{
    public function index()
    {        
        return view('inicio');
    }

    public function login()
    {
        return view('login');
    }

    public function teste(Request $request)
    {
        $token = JWTAuth::getToken();
        return redirect()->route('character.historic',['token' => $token]);
    }

}
