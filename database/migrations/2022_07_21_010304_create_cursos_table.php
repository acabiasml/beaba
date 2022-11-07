<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('nome')->nullable();
            $table->string('status')->nullable();
            $table->string('modalidade')->nullable();

            $table->integer('calendarios_id')->unsigned()->nullable();
            $table->integer('inicio')->unsigned()->nullable();
            $table->integer('fim')->unsigned()->nullable();
        });

        Schema::table('cursos', function(Blueprint $table){
            $table->foreign('calendarios_id')->references('id')->on('calendarios');
            $table->foreign('inicio')->references('id')->on('periodos');
            $table->foreign('fim')->references('id')->on('periodos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
