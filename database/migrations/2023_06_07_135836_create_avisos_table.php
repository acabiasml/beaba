<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvisosTable extends Migration
{
    public function up()
    {
        Schema::create('avisos', function (Blueprint $table) {
            $table->increments('id', true);
            $table->date('dia')->nullable();
            $table->string('aviso')->nullable();

            $table->integer('escola')->unsigned()->nullable();
            $table->integer('enviadopor')->unsigned()->nullable();
        });

        Schema::table('avisos', function($table) {
            $table->foreign('escola')->references('id')->on('escolas');
            $table->foreign('enviadopor')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('avisos');
    }
}
