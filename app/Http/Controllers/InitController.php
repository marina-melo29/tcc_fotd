<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Api\AuthController;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class InitController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->only(['index']);
    }


    public function index()
    {        
    	$islogged = "false";
        $evaluation = null;

    	if (Auth::check()) 
    	{
    		$islogged = "true";

            try
            {

                $evaluation = User::select('evaluation')->where('id',Auth::id())->first();

            }catch(Throwable $th) {
                echo "<script>console.log(".$th.")</script>";
            }

    	}    	


        return view('inicio',["lggd" => $islogged, "eval" => $evaluation]);

    }

    public function response(Request $request)
    {
        
        try 
        {

            $userId = Auth::id(); 
            $userEvaluation = User::select('evaluation')->where('id',$userId)->first();

            if ($userEvaluation != null) 
            { //Cai aqui quando o usuário vai atualizar a avaliação

                $evaluation = ['evaluation' => $request->evaluation];                    
                $tb_user = User::find(Auth::id());           
                $tb_user->update($evaluation);
                
            } else 
            {//Cai aqui quando o usuário não possui nenhuma avaliação registrada

                $tb_user = User::find(Auth::id());

                $tb_user->evaluation = $request->evaluation;

                $tb_user->save();                

            } 

            $teste['success'] = true;
            $teste['message'] = $request->evaluation;
            echo json_encode($teste);
            return;

        } catch (Throwable $th) 
        {

            $teste['success'] = false;
            $teste['message'] = 'erro '+$th;
            echo json_encode($teste);
            return;

        }
                    
                   
         
    }

}
