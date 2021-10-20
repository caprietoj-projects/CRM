<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMaintenancesTable extends Migration
{
    public function up()
    {
        Schema::table('maintenances', function (Blueprint $table) {
            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id', 'area_fk_4944129')->references('id')->on('fichas_tecnicas');
            $table->unsignedBigInteger('quien_lo_realiza_id');
            $table->foreign('quien_lo_realiza_id', 'quien_lo_realiza_fk_4989000')->references('id')->on('agentes');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_4943176')->references('id')->on('users');
        });
    }
}
