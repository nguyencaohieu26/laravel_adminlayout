<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role__users', function (Blueprint $table) {
            $table->id();
            $table->string('created_by',50);
            $table->unsignedBigInteger('User_ID');
            $table->unsignedBigInteger('Role_ID');
            $table->foreign('Role_ID')->references('id')->on('roles');
            $table->foreign('User_id')->references('id')->on('accounts');
            $table->integer('status');
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
        Schema::dropIfExists('role__users');
    }
}
