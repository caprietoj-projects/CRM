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
            $table->string('vacante')->nullable();
            $table->string('icono')->nullable();
            $table->longText('descripcion')->nullable();
            $table->longText('requisitos')->nullable();
            $table->string('tiempo')->nullable();
            $table->string('empresa')->nullable();
            $table->decimal('salario', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
