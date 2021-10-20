<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaTecnicasTable extends Migration
{
    public function up()
    {
        Schema::create('ficha_tecnicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('descripcion');
            $table->string('modelo')->nullable();
            $table->string('serial');
            $table->string('color');
            $table->string('tipo');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
