<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNumerosTable extends Migration
{
    public function up()
    {
        Schema::create('numeros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero',2);
            $table->string('color',7);
            $table->double('probabilidad',3,3);
        });
    }

    public function down()
    {
        Schema::dropIfExists('numeros');
    }
}
