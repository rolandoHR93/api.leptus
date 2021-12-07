<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposPermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leptus.grupos_permisos', function (Blueprint $table) {
            $table->id();
            // $table->unsignedInteger('grupos_id');
            // $table->foreign('grupos_id')->references('id')->on('leptus.Grupos');
            // $table->unsignedInteger('permisos_id');
            // $table->foreign('permisos_id')->references('id')->on('leptus.Permisos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leptus.grupos_permisos');
    }
}
