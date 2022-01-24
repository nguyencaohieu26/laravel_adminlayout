<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('username',50)->unique();
            $table->string('fullname',100);
            $table->char('address',200);
            $table->string('email',50);
            $table->string('phone',20);
            $table->char('password',255);
            $table->char('image',255);
            $table->integer('status');
            $table->char('created_by',50)->nullable();
            $table->char('updated_by',50)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('accounts');
    }
}
