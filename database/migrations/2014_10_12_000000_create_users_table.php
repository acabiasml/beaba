<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer("id")->autoIncrement();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('escolafkid');
            $table->string('codigo')->nullable();
            $table->string('tipo')->nullable();
            $table->string('codinep')->nullable();
            $table->string('nomesocial')->nullable();
            $table->string('nascimento')->nullable();
            $table->string('sexo')->nullable();
            $table->string('cor')->nullable();
            $table->string('gemeo')->nullable();
            $table->string('genitora')->nullable();
            $table->string('genitor')->nullable();
            $table->string('responsavel')->nullable();
            $table->string('responcpf')->nullable();
            $table->string('respontelefone1')->nullable();
            $table->string('respontelefone2')->nullable();
            $table->string('nacionalidade')->nullable();
            $table->string('naturalidade')->nullable();
            $table->string('naturaliuf')->nullable();
            $table->string('identidade')->nullable();
            $table->string('identemissor')->nullable();
            $table->string('identuf')->nullable();
            $table->string('identexpedicao')->nullable();
            $table->string('cpf')->nullable();
            $table->string('docextrangeiro')->nullable();
            $table->string('certidao')->nullable();
            $table->string('certifolha')->nullable();
            $table->string('certilivro')->nullable();
            $table->string('certiemissao')->nullable();
            $table->string('titulo')->nullable();
            $table->string('titulozona')->nullable();
            $table->string('titulosessao')->nullable();
            $table->string('titulouf')->nullable();
            $table->string('docmilitar')->nullable();
            $table->string('endlogradouro')->nullable();
            $table->string('endnumero')->nullable();
            $table->string('endbairro')->nullable();
            $table->string('endcomplemento')->nullable();
            $table->string('endcep')->nullable();
            $table->string('endmunicipio')->nullable();
            $table->string('enduf')->nullable();
            $table->string('telefone1')->nullable();
            $table->string('telefone2')->nullable();
            $table->string('cartaosus')->nullable();
            $table->string('tiposangue')->nullable();
            $table->string('nutricionais')->nullable();
            $table->string('nis')->nullable();
            $table->string('carteiratrabalho')->nullable();
            $table->string('carteiratrabserie')->nullable();
            $table->string('carteiratrabuf')->nullable();
            $table->string('habilitacao')->nullable();
            $table->string('habilitacaocategoria')->nullable();
            $table->string('habilitacaovalidade')->nullable();
            $table->string('banco')->nullable();
            $table->string('agencia')->nullable();
            $table->string('conta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
