<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFichaTecnicasTable extends Migration
{
    public function up()
    {
        Schema::table('ficha_tecnicas', function (Blueprint $table) {
            $table->unsignedBigInteger('grupo_id');
            $table->foreign('grupo_id', 'grupo_fk_5005502')->references('id')->on('grupos');
            $table->unsignedBigInteger('ubicacion_id');
            $table->foreign('ubicacion_id', 'ubicacion_fk_5005507')->references('id')->on('sedes');
            $table->unsignedBigInteger('encargado_id');
            $table->foreign('encargado_id', 'encargado_fk_5005508')->references('id')->on('agentes');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_5005512')->references('id')->on('users');
        });
    }
}
