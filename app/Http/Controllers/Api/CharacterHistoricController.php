<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CharacterHistoricController extends Controller
{
    public function get_records_layout($token)
    {
        return view('Ficha/ficha');
    }
}
