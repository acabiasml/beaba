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
            $table->date('inicio')->nullable();
            $table->date('fim')->nullable();
            $table->string('nome')->nullable();
            $table->string('status')->nullable();

            $table->integer('calendarios_id')->unsigned()->nullable();
        });

        Schema::table('cursos', function(Blueprint $table){
            $table->foreign('calendarios_id')->references('id')->on('calendarios');
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
