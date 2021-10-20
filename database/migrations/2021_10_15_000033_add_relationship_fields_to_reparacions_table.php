<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReparacionsTable extends Migration
{
    public function up()
    {
        Schema::table('reparacions', function (Blueprint $table) {
            $table->unsignedBigInteger('activo_id');
            $table->foreign('activo_id', 'activo_fk_5005691')->references('id')->on('ficha_tecnicas');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_5005697')->references('id')->on('users');
        });
    }
}
