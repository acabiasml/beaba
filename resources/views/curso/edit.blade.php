@extends('principais.layout')

@section('title', 'EDITAR CURSO')
@section('icon', 'ni-watch-time')

@section('content')

<a href="{{route('escolas', $escola->id)}}">{{$escola->nome}}</a> >> 
<a href="{{route('calendarios', $calendario->id)}}">{{$calendario->nome}} - {{$calendario->ano}}</a> >> 
Cursos <br/><br/>
<h1>Editando</h1>

<div class="container-fluid" style="margin-top: 20px; margin-bottom: 50px">
    <x:form::form :bind="$curso" class="row" method="POST" :action="route('curso.update')">
        <x:form::input type="hidden" name="calendarios_id" value="{{$calendario->id}}" />
        <x:form::input type="hidden" name="id" />
        <div class="col-md-6">
            <x:form::input id="nome" name="nome" label="Nome: " :placeholder="false"/>
            <x:form::radio name="modalidade" label="Modalidade: " :group="['infantil' => 'Educação Infantil', 'fundamental' => 'Ensino Fundamental', 'medio' => 'Ensino Médio', 'tecnico' => 'Ensino Técnico Profissionalizante']" inline/>
            <x:form::radio name="status" label="Status" :group="['iniciado' => 'Iniciado', 'finalizado' => 'Finalizado', 'suspenso' => 'Suspenso']" inline/>
        </div>
        <div class="col-md-6">
            <x:form::select name="inicio" label="Período de Início: " :placeholder="false" :options="$periodos" />
            <x:form::select name="fim" label="Período de Fim: " :placeholder="false" :options="$periodos" />
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