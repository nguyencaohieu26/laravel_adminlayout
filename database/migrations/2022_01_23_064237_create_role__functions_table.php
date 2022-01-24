<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleFunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role__functions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Function_ID');
            $table->unsignedBigInteger('Role_ID');
            $table->string('created_by',50);
            $table->integer('status');
            $table->foreign('Role_ID')->references('id')->on('roles');
            $table->foreign('Function_ID')->references('id')->on('functions');
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
        Schema::dropIfExists('role__functions');
    }
}
