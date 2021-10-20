<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdiomasgestionhumanasTable extends Migration
{
    public function up()
    {
        Schema::create('idiomasgestionhumanas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nuevo');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
