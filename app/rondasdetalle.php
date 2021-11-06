<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rondasdetalle extends Model
{
    protected $fillable = [
        'id_jugador', 'id_numero', 'valor_apuesta', 'tipo_resultado', 'resultado'
    ];

    protected $table = 'rondas_detalle';
    public $timestamps = false;
    protected $primaryKey = "id";
}