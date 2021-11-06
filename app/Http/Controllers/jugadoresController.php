<?php

namespace App\Http\Controllers;

use App\jugadores;
use Response;
use DB;
use Datatables;
use Illuminate\Http\Request;

class jugadoresController extends Controller
{
    public function index()
    {
        return view('admin.jugadores');
    }

    public function show()
    {
        $jugadores = DB::table('jugadores')->get();

        return Datatables($jugadores)->toJson();
    }

    public function store(Request $request)
    {
		$jugadores = new jugadores();
        $jugadores->nombre = $request['nombre'];
        $jugadores->identificacion = $request['identifica'];
        $jugadores->dinero = $request['dinero'];
        $jugadores->save();
        
        return 'Registro almacenado correctamente' ;
    }

    public function update(Request $request, $id)
    {
		$jugadores = jugadores::findOrFail($id);
        $jugadores->nombre = $request['nombre'];
        $jugadores->identificacion = $request['identifica'];
        $jugadores->dinero = $request['dinero'];
        $jugadores->save();
        
        return 'Registro modificado correctamente' ;
    }

    public function destroy(Request $request, $id)
    {
		$jugadores = jugadores::findOrFail($id);
        $jugadores->delete();
        
        return 'Registro eliminado correctamente' ;
    }
}
