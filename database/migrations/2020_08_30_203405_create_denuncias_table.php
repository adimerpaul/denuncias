<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDenunciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denuncias', function (Blueprint $table) {
            $table->id();
            $table->string('solicitud')->default('');
            $table->string('nombre')->default('');
            $table->string('ci')->default('');
            $table->string('celular')->default('');
            $table->string('correo')->default('');
            $table->string('direccion')->default('');
            $table->string('denunciados')->default('');
            $table->string('descripcion')->default('');
            $table->string('estado')->default('CREADO');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('denuncias');
    }
}
