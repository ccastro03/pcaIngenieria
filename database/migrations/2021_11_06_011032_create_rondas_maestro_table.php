<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRondasMaestroTable extends Migration
{
    public function up()
    {
        Schema::create('rondas_maestro', function (Blueprint $table) {
            $table->bigIncrements('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rondas_maestro');
    }
}
