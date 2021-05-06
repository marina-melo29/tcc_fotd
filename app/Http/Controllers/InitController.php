<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Api\AuthController;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InitController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->only(['index']);
    }


    public function index()
    {        
    	$islogged = "false";

    	if (Auth::check()) 
    	{
    		$islogged = "true";
    	}    	

        return view('inicio',["lggd" => $islogged]);

    }

 

}
