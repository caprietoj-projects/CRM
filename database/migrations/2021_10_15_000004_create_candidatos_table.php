<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatosTable extends Migration
{
    public function up()
    {
        Schema::create('candidatos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('primer_apellido');
            $table->string('segundo_apellido');
            $table->string('nombres');
            $table->string('documento_de_identidad');
            $table->float('no_de_identificacion', 15, 1);
            $table->date('fecha_de_expedicion_del_documento');
            $table->date('fecha_de_nacimiento');
            $table->string('departamento');
            $table->string('ciudad');
            $table->string('direccion');
            $table->string('departamento_de_nacimiento');
            $table->string('ciudad_de_nacimiento');
            $table->string('telefono_personal');
            $table->string('celular_personal');
            $table->string('email_personal');
            $table->string('email_familiar');
            $table->string('telefono_familiar');
            $table->string('celular_familiar');
            $table->string('secundaria')->nullable();
            $table->string('media')->nullable();
            $table->string('titulo_obtenido')->nullable();
            $table->date('fecha_de_graduacion')->nullable();
            $table->string('nivel_academico')->nullable();
            $table->integer('no_de_semestres')->nullable();
            $table->string('graduado')->nullable();
            $table->string('titulo_obtenido_superior')->nullable();
            $table->date('fecha_de_grado_superior')->nullable();
            $table->string('idioma')->nullable();
            $table->string('otro_idioma')->nullable();
            $table->string('habla')->nullable();
            $table->string('lectura')->nullable();
            $table->string('escritura')->nullable();
            $table->string('ofimatica')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
