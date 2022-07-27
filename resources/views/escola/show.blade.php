@extends('principais.layout')

@section('title', 'DADOS DE CADASTRO DE ESCOLA')
@section('icon', 'ni-shop')

@section('content')

<div style="text-align: right">
    <a href="{{route('escolas')}}">
        <button type="button" class="btn btn-secondary">Voltar</button>
    </a>
    <a href="{{route('escola.print', $escola->id)}}">
        <button type="button" class="btn btn-primary">Imprimir</button>
    </a>
    <a href="{{route('escola.edit', $escola->id)}}">
        <button type="button" class="btn btn-warning">Editar</button>
    </a>
</div><br/>

<div class="container-fluid" style="margin-bottom: 50px">
    <x:form::form :bind="$escola" class="row">
    <div class="col-md-6">
            <x:form::input readonly id="nome" name="nome" label="Nome" />
            <x:form::input readonly type="date" name="fundacao" label="Data de fundação" />
            <x:form::input readonly name="info" label="Informações de Fundação e Autorização" />
            <x:form::input readonly name="razao" label="Razão Social" />
            <x:form::input readonly name="cnpj" label="CNPJ" />
            <x:form::input readonly name="telefone" label="Telefone" />
            <x:form::input readonly name="email" label="E-mail" />
            <x:form::input readonly name="site" label="Site" />
        </div>
        <div class="col-md-6">
            <x:form::select style="background: #eee; pointer-events: none; touch-action: none;" name="diretor" label="Diretoria" :options="$pessoas"/>
            <x:form::select style="background: #eee; pointer-events: none; touch-action: none;" name="coordenador" label="Coordenação" :options="$pessoas"/>
            <x:form::select style="background: #eee; pointer-events: none; touch-action: none;" name="secretario" label="Secretaria" :options="$pessoas"/>
            <x:form::input readonly name="endereco" label="Logradouro" />
            <x:form::input readonly name="numero" label="Número" />
            <x:form::input readonly name="bairro" label="Bairro" />
            <x:form::input readonly name="cidade" label="Cidade" />
            <x:form::select style="background: #eee; pointer-events: none; touch-action: none;" name="estado" label="Estado: " :options="['MT' => 'MT', 'AC' => 'AC', 'AL' => 'AL', 'AP' => 'AP', 'AM' => 'AM', 'BA' => 'BA', 'CE' => 'CE', 'DF' => 'DF', 'ES' => 'ES', 'GO' => 'GO', 'MA' => 'MA', 'MS' => 'MS', 'MG' => 'MG', 'PA' => 'PA', 'PB' => 'PB', 'PR' => 'PR', 'PE' => 'PE', 'PI' => 'PI', 'RR' => 'RR', 'RO' => 'RO', 'RJ' => 'RJ', 'RN' => 'RN', 'RS' => 'RS', 'SC' => 'SC', 'SP' => 'SP', 'SE' => 'SE', 'TO' => 'TO']" selected="MT" />
            <x:form::input readonly name="cep" label="CEP" />
        </div>
    </x:form::form>
</div>

@endsection