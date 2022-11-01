@extends('principais.layout')

@section('title', 'EDITAR CALENDÁRIO')
@section('icon', 'ni-calendar-grid-58')

@section('content')

<div class="container-fluid" style="margin-top: 20px; margin-bottom: 50px">
    <h1 style="text-align: center">Editando componente para o curso <br/> {{$curso->nome}}</h1>
    <h1 style="text-align: center">{{$calendario->nome}} | {{$escola->nome}}</h1> <br />

    <x:form::form :bind="$calendario" class="row" method="POST" :action="route('calendario.update')">
    <x:form::input type="hidden" name="cursos_id" value="{{$curso->id}}" />
        <div class="col-md-6">
            <x:form::input id="nome" name="nome" label="Nome do Componente: " :placeholder="false"/>
            <x:form::select name="professor" label="Professor Regente: " :options="$professores" :placeholder="false"/>
        </div>
        <div class="col-md-6">
            <x:form::input type="number" name="horas" label="Carga Horária (total de horas): " :placeholder="false"/>
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