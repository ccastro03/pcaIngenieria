<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rondas_detalle extends Model
{
    protected $fillable = [
        'id_ronda', 'id_jugador', 'id_numero', 'valor_apuesta', 'tipo_resultado', 'valor_resultado'
    ];

    protected $table = 'rondas_detalle';
    public $timestamps = false;
    protected $primaryKey = "id";
}