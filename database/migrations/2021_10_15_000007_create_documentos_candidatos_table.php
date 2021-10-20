<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosCandidatosTable extends Migration
{
    public function up()
    {
        Schema::create('documentos_candidatos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_de_cedula');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
