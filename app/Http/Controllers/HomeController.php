<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
}
