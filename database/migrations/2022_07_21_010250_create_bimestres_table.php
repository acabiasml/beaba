<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBimestresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bimestres', function (Blueprint $table) {
            $table->increments('id', true);
            $table->date('inicio')->nullable();
            $table->date('fim')->nullable();
            
            $table->integer('calendarios_id')->unsigned()->nullable();
        });

        Schema::table('bimestres', function(Blueprint $table){
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
        Schema::dropIfExists('bimestres');
    }
}
