@extends('principais.layout')

@section('title', 'EDITAR CADASTRO DE ESCOLA')
@section('icon', 'ni-shop')

@section('content')

<div class="container-fluid" style="margin-top: 20px; margin-bottom: 50px">
    <h1 style="text-align: center">EDITAR CADASTRO</h1> <br />

    <x:form::form :bind="$escola" class="row" method="POST" :action="route('escola.update.escola')">
    <div class="col-md-6">
            <x:form::input type="hidden" name="id"/>
            <x:form::input id="nome" name="nome" label="Nome" />
            <x:form::input type="date" name="fundacao" label="Data de fundação" />
            <x:form::input name="info" label="Informações de Fundação e Autorização" />
            <x:form::input name="razao" label="Razão Social" />
            <x:form::input name="cnpj" label="CNPJ" />
            <x:form::input name="telefone" label="Telefone" />
            <x:form::input name="email" label="E-mail" />
            <x:form::input name="site" label="Site" />
        </div>
        <div class="col-md-6">
            <x:form::select name="diretor" label="Diretoria" :options="$pessoas"/>
            <x:form::select name="coordenador" label="Coordenação" :options="$pessoas"/>
            <x:form::select name="secretario" label="Secretaria" :options="$pessoas"/>
            <x:form::input name="endereco" label="Logradouro" />
            <x:form::input name="numero" label="Número" />
            <x:form::input name="bairro" label="Bairro" />
            <x:form::input name="cidade" label="Cidade" />
            <x:form::select name="estado" label="Estado: " :options="['MT' => 'MT', 'AC' => 'AC', 'AL' => 'AL', 'AP' => 'AP', 'AM' => 'AM', 'BA' => 'BA', 'CE' => 'CE', 'DF' => 'DF', 'ES' => 'ES', 'GO' => 'GO', 'MA' => 'MA', 'MS' => 'MS', 'MG' => 'MG', 'PA' => 'PA', 'PB' => 'PB', 'PR' => 'PR', 'PE' => 'PE', 'PI' => 'PI', 'RR' => 'RR', 'RO' => 'RO', 'RJ' => 'RJ', 'RN' => 'RN', 'RS' => 'RS', 'SC' => 'SC', 'SP' => 'SP', 'SE' => 'SE', 'TO' => 'TO']" selected="MT" />
            <x:form::input name="cep" label="CEP" />
        </div>
        <div class="col-12 mt-2">
            <x:form::button.link class="btn-secondary me-3" href="{{route('escolas')}}">{{ __('Cancel') }}</x:form::button.link>
            <x:form::button.submit>Atualizar registro</x:form::button.submit>
        </div>
    </x:form::form>
</div>

<script>
    $(document).ready(function() {
        $(":submit").on("click", function(e) {
            e.preventDefault();

            nome = $.trim($("#nome").val());

            if (nome != "") {
                $("form:first").submit();
            } else {
                alert("Existem campos a serem preenchidos.");
            }

            return false;
        });
    });
</script>

@endsection