<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GrupoxservicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leptus.grupo_servicio', function (Blueprint $table) {
            $table->id();
            $table->integer('servicio_id');
            $table->integer('gruposervicio_id');
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
        Schema::dropIfExists('leptus.grupo_servicio');
    }
}
