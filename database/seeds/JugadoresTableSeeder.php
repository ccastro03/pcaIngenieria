<?php

use App\jugadores;
use Illuminate\Database\Seeder;

class JugadoresTableSeeder extends Seeder
{
    public function run()
    {
		$jugadores = new jugadores();
        $jugadores->nombre = 'Carlo Castro';
        $jugadores->identificacion = '123456';
        $jugadores->dinero = 20000;
        $jugadores->save();

		$jugadores = new jugadores();
        $jugadores->nombre = 'Arturo Castro';
        $jugadores->identificacion = '654321';
        $jugadores->dinero = '55328';
        $jugadores->save();        
    }
}
