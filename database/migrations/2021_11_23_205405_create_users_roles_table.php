<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leptus.users_roles', function (Blueprint $table) {
            $table->id();
            // $table->unsignedInteger('users_id');
            // $table->foreign('users_id')->references('id')->on('leptus.users');
            // $table->unsignedInteger('roles_id');
            // $table->foreign('roles_id')->references('id')->on('leptus.Roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leptus.users_roles');
    }
}
