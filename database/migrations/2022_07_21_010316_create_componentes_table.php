<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('componentes', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('nome')->nullable();
            $table->string('horas')->nullable();

            $table->integer('cursos_id')->unsigned()->nullable();
            $table->integer('professor')->unsigned()->nullable();
        });

        Schema::table('componentes', function(Blueprint $table){
            $table->foreign('cursos_id')->references('id')->on('cursos');
            $table->foreign('professor')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('componentes');
    }
}
