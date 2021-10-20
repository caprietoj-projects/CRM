<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosArticuladosTable extends Migration
{
    public function up()
    {
        Schema::create('proyectos_articulados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_del_estudiante');
            $table->integer('curso');
            $table->string('tema_del_proyecto');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
