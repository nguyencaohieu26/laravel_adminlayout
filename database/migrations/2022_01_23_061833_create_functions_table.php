<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('functions', function (Blueprint $table) {
            $table->id();
            $table->integer('Parent_ID')->nullable();
            $table->char('Func_Code',50)->unique();
            $table->char('Func_Url',255);
            $table->char('Func_Name',100);
            $table->text('Description');
            $table->integer('Func_Level')->nullable();
            $table->integer('status');
            $table->integer('Show_Menu');
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
        Schema::dropIfExists('functions');
    }
}
