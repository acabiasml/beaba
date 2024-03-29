<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscolasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escolas', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('nome')->nullable();
            $table->date('fundacao')->nullable();
            $table->string('info')->nullable();
            $table->string('razao')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->string('site')->nullable();
            $table->string('endereco')->nullable();
            $table->string('bairro')->nullable();
            $table->string('numero')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('cep')->nullable();

            $table->integer('diretor')->unsigned()->nullable();
            $table->integer('coordenador')->unsigned()->nullable();
            $table->integer('secretario')->unsigned()->nullable();
        });

        Schema::table('escolas', function($table) {
            $table->foreign('diretor')->references('id')->on('users');
            $table->foreign('coordenador')->references('id')->on('users');
            $table->foreign('secretario')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('escolas');
    }
}
