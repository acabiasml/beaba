<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodosTable extends Migration
{

    public function up()
    {
        Schema::create('periodos', function (Blueprint $table) {
            $table->increments('id', true);
            $table->date('nome')->nullable();
            $table->date('inicio')->nullable();
            $table->date('fim')->nullable();
            
            $table->integer('calendarios_id')->unsigned()->nullable();
        });

        Schema::table('periodos', function(Blueprint $table){
            $table->foreign('calendarios_id')->references('id')->on('calendarios');
        });
    }

    public function down()
    {
        Schema::dropIfExists('periodos');
    }
}
