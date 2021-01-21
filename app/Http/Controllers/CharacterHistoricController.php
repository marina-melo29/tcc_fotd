<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CharacterHistoricController extends Controller
{
    public function index()
    {
        return view('ficha\historico_ficha');
    }
}
