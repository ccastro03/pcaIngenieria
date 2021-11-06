<?php

namespace App\Http\Controllers;

use DB;
use Response;
use App\jugadores;
use App\rondas_detalle;
use Illuminate\Http\Request;

class ruletaController extends Controller
{
    public function index()
    {
        $jugadores = DB::table('jugadores')->where("dinero",">",0)->get();
        $numeros = DB::table('numeros')->get();
        $ronda = DB::table('rondas_maestro')->orderBy('id', 'desc')->get();

        $rondetalle = DB::table('rondas_detalle')->leftjoin('jugadores', 'jugadores.id', '=', 'rondas_detalle.id_jugador')
        ->leftjoin('numeros', 'numeros.id', '=', 'rondas_detalle.id_numero')
        ->select('rondas_detalle.*', 'jugadores.nombre as jugador', 'numeros.numero as numero')->get();

        return view('front.ruleta', [
            'jugadores' => $jugadores,
            'numeros' => $numeros,
            'ronda' => $ronda,
            'rondetalle' => $rondetalle,
        ]);
    }

    public function hacerApuesta(Request $request)
    {
        // $rondas_detalle = new rondas_detalle();
        // $rondas_detalle->id_ronda = $request['ractual'];
        // $rondas_detalle->id_jugador = $request['jugador'];
        // $rondas_detalle->id_numero = $request['numero'];
        // $rondas_detalle->valor_apuesta = $request['vlrApuesta'];
        // $rondas_detalle->save();

		// $jugadores = jugadores::findOrFail($request['jugador']);
        // $jugadores->dinero = $jugadores->dinero - $request['vlrApuesta'];
        // $jugadores->save();        

        return 'Apuesta realizada correctamente' ;        
    }
}
