<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turmas', function (Blueprint $table) {

            $table->increments('id', true);

            $table->integer('cursos_id')->unsigned()->nullable();
            $table->integer('users_id')->unsigned()->nullable();
        });

        Schema::table("turmas", function(Blueprint $table){
            $table->foreign('cursos_id')->references('id')->on('cursos');
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turmas');
    }
}
