@extends('principais.layout')

@section('title', 'NOVO COMPONENTE')
@section('icon', 'ni-calendar-grid-58')

@section('content')

<a href="{{route('escolas', $escola->id)}}">{{$escola->nome}}</a> >> 
<a href="{{route('calendarios', $calendario->id)}}">{{$calendario->nome}} - {{$calendario->ano}}</a> >>
<a href="{{route('cursos', $calendario->id)}}">{{$curso->nome}}</a> >> 
Componentes <br/><br/>
<h1>Novo</h1>

<div class="container-fluid" style="margin-top: 20px; margin-bottom: 50px">
    <x:form::form class="row" method="POST" :action="route('componente.store')">
        <x:form::input type="hidden" name="cursos_id" value="{{$curso->id}}" />
        <div class="col-md-6">
            <x:form::input id="nome" name="nome" label="Nome: " :placeholder="false"/>
            <x:form::select name="professor" label="Professor Regente: " :options="$professores" :placeholder="false"/>
        </div>
        <div class="col-md-6">
            <x:form::select name="area_id" label="Área do Conhecimento: " :options="$area" :placeholder="false"/>
            <x:form::input type="number" name="horas" label="Carga Horária (total de horas): " :placeholder="false"/>
        </div>
        <div class="col-12 mt-2">
            <x:form::button.link class="btn-secondary me-3" href="{{route('componentes', $curso->id)}}">{{ __('Cancel') }}</x:form::button.link>
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