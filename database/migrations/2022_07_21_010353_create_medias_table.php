<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediasTable extends Migration
{
    public function up()
    {
        Schema::create('medias', function (Blueprint $table) {

            $table->increments('id', true);
            $table->string('nota')->nullable();

            $table->integer('componentes_id')->unsigned()->nullable();
            $table->integer('users_id')->unsigned()->nullable();
            $table->integer('periodos_id')->unsigned()->nullable();
        });

        Schema::table("medias", function(Blueprint $table){
            $table->foreign('componentes_id')->references('id')->on('componentes');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('periodos_id')->references('id')->on('periodos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('medias');
    }
}
