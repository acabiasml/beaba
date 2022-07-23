<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diarios', function (Blueprint $table) {
            $table->increments('id', true);
            $table->date('data')->nullable();
            $table->string('conteudo')->nullable();

            $table->integer('componentes_id')->unsigned()->nullable();
        });

        Schema::table("diarios", function (Blueprint $table){
            $table->foreign('componentes_id')->references('id')->on('componentes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diarios');
    }
}
