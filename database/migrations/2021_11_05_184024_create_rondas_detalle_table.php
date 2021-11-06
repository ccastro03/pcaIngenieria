<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRondasDetalleTable extends Migration
{
    public function up()
    {
        Schema::create('rondas_detalle', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_ronda');
            $table->integer('id_jugador');
            $table->integer('id_numero');
            $table->double('valor_apuesta', 10,2);
            $table->string('tipo_resultado',4)->nullable();
            $table->double('valor_resultado', 10,2)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rondas_detalle');
    }
}
