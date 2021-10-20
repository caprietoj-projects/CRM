<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleosTable extends Migration
{
    public function up()
    {
        Schema::create('empleos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vacante');
            $table->longText('descripcion');
            $table->longText('requisitos');
            $table->string('tiempo');
            $table->integer('salario');
            $table->string('empresa');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
