<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GruposervicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leptus.grupoServicios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_grupo', 255);
            $table->string('descripcion', 255);
            $table->integer('num_orden');
            $table->integer('meses');
            $table->double('precio');
            $table->integer('flag');
            $table->integer('state');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leptus.grupoServicios');
    }
}
