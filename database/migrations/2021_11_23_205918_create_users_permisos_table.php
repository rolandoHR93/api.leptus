<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersPermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leptus.users_permisos', function (Blueprint $table) {
            $table->id();

            // $table->unsignedInteger('users_id');
            // $table->foreign('users_id')->references('id')->on('leptus.users');
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
        Schema::dropIfExists('leptus.users_permisos');
    }
}
