<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class ruletaController extends Controller
{
    public function index()
    {
        $jugadores = DB::table('jugadores')->where("dinero",">",0)->get();
        $numeros = DB::table('numeros')->get();

        return view('front.ruleta', [
            'jugadores' => $jugadores,
            'numeros' => $numeros
        ]);
    }
}
