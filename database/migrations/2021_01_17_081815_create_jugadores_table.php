<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJugadoresTable extends Migration
{
    public function up()
    {
        Schema::create('jugadores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 80);
            $table->string('identificacion', 30);
            $table->double('dinero', 10,2);
        });
    }

    public function down()
    {
        Schema::dropIfExists('jugadores');
    }
}
