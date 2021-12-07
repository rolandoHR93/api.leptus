<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leptus.users_grupos', function (Blueprint $table) {
            $table->id();
            // $table->unsignedInteger('users_id');
            // $table->foreign('users_id')->references('id')->on('leptus.users');
            // $table->unsignedInteger('grupos_id');
            // $table->foreign('grupos_id')->references('id')->on('leptus.Grupos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leptus.users_grupos');
    }
}
