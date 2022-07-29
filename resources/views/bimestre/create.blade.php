@extends('principais.layout')

@section('title', 'NOVO BIMESTRE')
@section('icon', 'ni-watch-time')

@section('content')

<div class="container-fluid" style="margin-top: 20px; margin-bottom: 50px">
    <h1 style="text-align: center">Novo Bimestre | {{$escola->nome}}</h1> <br />

    <x:form::form class="row" method="POST" :action="route('calendario.store')">
        <x:form::input type="hidden" name="escolas_id" value="{{$escola->id}}" />
        <div class="col-md-6">
            <x:form::input id="nome" name="nome" label="Nome" />
        </div>
        <div class="col-md-6">
            <x:form::input name="ano" label="Ano" />
        </div>
        <div class="col-12 mt-2">
            <x:form::button.link class="btn-secondary me-3" href="{{route('escolas')}}">{{ __('Cancel') }}</x:form::button.link>
            <x:form::button.submit>Registrar</x:form::button.submit>
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