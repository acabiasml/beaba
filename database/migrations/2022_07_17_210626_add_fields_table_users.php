<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('codigo')->nullable()->after('password');
            $table->string('tipo')->nullable()->after('codigo');
            $table->string('codinep')->nullable()->after('tipo');
            $table->string('nomesocial')->nullable()->after('codinep');
            $table->string('nascimento')->nullable()->after('nomesocial');
            $table->string('sexo')->nullable()->after('nascimento');
            $table->string('cor')->nullable()->after('sexo');
            $table->string('gemeo')->nullable()->after('cor');
            $table->string('genitora')->nullable()->after('gemeo');
            $table->string('genitor')->nullable()->after('genitora');
            $table->string('responsavel')->nullable()->after('genitor');
            $table->string('responcpf')->nullable()->after('responsavel');
            $table->string('respontelefone1')->nullable()->after('responcpf');
            $table->string('respontelefone2')->nullable()->after('respontelefone1');
            $table->string('nacionalidade')->nullable()->after('respontelefone2');
            $table->string('naturalidade')->nullable()->after('nacionalidade');
            $table->string('naturaliuf')->nullable()->after('naturalidade');
            $table->string('identidade')->nullable()->after('naturaliuf');
            $table->string('identemissor')->nullable()->after('identidade');
            $table->string('identuf')->nullable()->after('identemissor');
            $table->string('identexpedicao')->nullable()->after('identuf');
            $table->string('cpf')->nullable()->after('identexpedicao');
            $table->string('docextrangeiro')->nullable()->after('cpf');
            $table->string('certidao')->nullable()->after('docextrangeiro');
            $table->string('certifolha')->nullable()->after('certidao');
            $table->string('certilivro')->nullable()->after('certifolha');
            $table->string('certiemissao')->nullable()->after('certilivro');
            $table->string('titulo')->nullable()->after('certiemissao');
            $table->string('titulozona')->nullable()->after('titulo');
            $table->string('titulosessao')->nullable()->after('titulozona');
            $table->string('titulouf')->nullable()->after('titulosessao');
            $table->string('docmilitar')->nullable()->after('titulouf');
            $table->string('endlogradouro')->nullable()->after('docmilitar');
            $table->string('endnumero')->nullable()->after('endlogradouro');
            $table->string('endbairro')->nullable()->after('endnumero');
            $table->string('endcomplemento')->nullable()->after('endbairro');
            $table->string('endcep')->nullable()->after('endcomplemento');
            $table->string('endmunicipio')->nullable()->after('endcep');
            $table->string('enduf')->nullable()->after('endmunicipio');
            $table->string('telefone1')->nullable()->after('enduf');
            $table->string('telefone2')->nullable()->after('telefone1');
            $table->string('cartaosus')->nullable()->after('telefone2');
            $table->string('tiposangue')->nullable()->after('cartaosus');
            $table->string('nutricionais')->nullable()->after('tiposangue');
            $table->string('nis')->nullable()->after('nutricionais');
            $table->string('carteiratrabalho')->nullable()->after('nis');
            $table->string('carteiratrabserie')->nullable()->after('carteiratrabalho');
            $table->string('carteiratrabuf')->nullable()->after('carteiratrabserie');
            $table->string('habilitacao')->nullable()->after('carteiratrabuf');
            $table->string('habilitacaocategoria')->nullable()->after('habilitacao');
            $table->string('habilitacaovalidade')->nullable()->after('habilitacaocategoria');
            $table->string('banco')->nullable()->after('habilitacaovalidade');
            $table->string('agencia')->nullable()->after('banco');
            $table->string('conta')->nullable()->after('agencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('tipo');
            $table->dropColumn('codinep');
            $table->dropColumn('nomesocial');
            $table->dropColumn('nascimento');
            $table->dropColumn('sexo');
            $table->dropColumn('cor');
            $table->dropColumn('gemeo');
            $table->dropColumn('genitora');
            $table->dropColumn('genitor');
            $table->dropColumn('responsavel');
            $table->dropColumn('responcpf');
            $table->dropColumn('respontelefone1');
            $table->dropColumn('respontelefone2');
            $table->dropColumn('email');
            $table->dropColumn('nacionalidade');
            $table->dropColumn('naturalidade');
            $table->dropColumn('naturaliuf');
            $table->dropColumn('identidade');
            $table->dropColumn('identemissor');
            $table->dropColumn('identuf');
            $table->dropColumn('identexpedicao');
            $table->dropColumn('cpf');
            $table->dropColumn('docextrangeiro');
            $table->dropColumn('certidao');
            $table->dropColumn('certifolha');
            $table->dropColumn('certilivro');
            $table->dropColumn('certiemissao');
            $table->dropColumn('titulo');
            $table->dropColumn('titulozona');
            $table->dropColumn('titulosessao');
            $table->dropColumn('titulouf');
            $table->dropColumn('docmilitar');
            $table->dropColumn('endlogradouro');
            $table->dropColumn('endnumero');
            $table->dropColumn('endbairro');
            $table->dropColumn('endcomplemento');
            $table->dropColumn('endcep');
            $table->dropColumn('endmunicipio');
            $table->dropColumn('enduf');
            $table->dropColumn('telefone1');
            $table->dropColumn('telefone2');
            $table->dropColumn('cartaosus');
            $table->dropColumn('tiposangue');
            $table->dropColumn('nutricionais');
            $table->dropColumn('nis');
            $table->dropColumn('carteiratrabalho');
            $table->dropColumn('carteiratrabserie');
            $table->dropColumn('carteiratrabuf');
            $table->dropColumn('habilitacao');
            $table->dropColumn('habilitacaocategoria');
            $table->dropColumn('habilitacaovalidade');
            $table->dropColumn('banco');
            $table->dropColumn('agencia');
            $table->dropColumn('conta');
        });
    }
}
