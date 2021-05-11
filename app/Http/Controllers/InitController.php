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

    public function response($request)
    {
    	
    	if(2 == 2){
    		$teste['success'] = true;
            $teste['message'] = "Success";

            echo json_encode($teste);
            return;
        
    	}
    	else
    	{
    		$teste['success'] = false;
            $teste['message'] = $t;

            echo json_encode($teste);
            return;	
    	}           
                    
         
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
