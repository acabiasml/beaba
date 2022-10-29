@extends('principais.layout')

@section('title', 'NOVO CURSO')
@section('icon', 'ni-watch-time')

@section('content')

<div class="container-fluid" style="margin-top: 20px; margin-bottom: 50px">
    <h1 style="text-align: center">Novo Curso | Calendário: {{$calendario->nome}}</h1> 
    <h1 style="text-align: center">{{$escola->nome}}</h1> <br />

    <x:form::form class="row" method="POST" :action="route('curso.store')">
        <x:form::input type="hidden" name="calendarios_id" value="{{$calendario->id}}" />
        <x:form::input type="hidden" name="status" value="suspenso" />
        <div class="col-md-6">
            <x:form::input id="nome" name="nome" label="Nome do Curso" />
        </div>
        <div class="col-md-6">
            <x:form::select name="inicio" label="Início" :options="$periodos" />
            <x:form::select name="fim" label="Fim" :options="$periodos" />
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