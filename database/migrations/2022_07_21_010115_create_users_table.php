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
            $table->increments('id', true);
            $table->string('nome')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('codigo')->nullable();
            $table->string('tipo')->nullable();
            $table->string('inep')->nullable();
            $table->string('nomesocial')->nullable();
            $table->date('nascimento')->nullable();
            $table->string('sexo')->nullable();
            $table->string('cor')->nullable();
            $table->string('gemeo')->nullable();
            $table->string('genitora')->nullable();
            $table->string('genitor')->nullable();
            $table->string('responsavel')->nullable();
            $table->string('responcpf')->nullable();
            $table->string('respontel1')->nullable();
            $table->string('respontel2')->nullable();
            $table->string('nacionalidade')->nullable();
            $table->string('naturalidade')->nullable();
            $table->string('naturaif')->nullable();
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
            $table->string('endereco')->nullable();
            $table->string('endnumero')->nullable();
            $table->string('endbairro')->nullable();
            $table->string('endcidade')->nullable();
            $table->string('endcomplemento')->nullable();
            $table->string('endcep')->nullable();
            $table->string('enduf')->nullable();
            $table->string('telefone1')->nullable();
            $table->string('telefone2')->nullable();
            $table->string('cartaosus')->nullable();
            $table->string('tiposangue')->nullable();
            $table->string('nutricionais')->nullable();
            $table->string('nis')->nullable();
            $table->string('carteiratrab')->nullable();
            $table->string('habilitacao')->nullable();
            $table->string('habilcategoria')->nullable();
            $table->string('habilvalidade')->nullable();
            $table->string('banco')->nullable();
            $table->string('agencia')->nullable();
            $table->string('conta')->nullable();

            $table->unique(["email"], 'email_UNIQUE');
            $table->nullableTimestamps();
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
