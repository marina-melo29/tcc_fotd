<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Api\AuthController;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;

class InitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['index']);
    }


    public function index()
    {        
        return view('inicio');
    }


}
