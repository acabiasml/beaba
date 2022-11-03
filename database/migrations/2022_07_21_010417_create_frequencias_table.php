<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrequenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frequencias', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('presenca', 45)->nullable();

            $table->integer('diarios_id')->unsigned()->nullable();
            $table->integer('users_id')->unsigned()->nullable();
            $table->integer('turmas_id')->unsigned()->nullable();
        });

        Schema::table("frequencias", function(Blueprint $table){
            $table->foreign('diarios_id')->references('id')->on('diarios');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('turmas_id')->references('id')->on('turmas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frequencias');
    }
}
