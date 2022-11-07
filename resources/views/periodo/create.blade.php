@extends('principais.layout')

@section('title', 'NOVO PERÍODO')
@section('icon', 'ni-watch-time')

@section('content')

<a href="{{route('escolas', $escola->id)}}">{{$escola->nome}}</a> >> 
<a href="{{route('calendarios', $calendario->id)}}">{{$calendario->nome}} - {{$calendario->ano}}</a> >> 
Períodos <br/><br/>
<h1>Novo</h1>

<div class="container-fluid" style="margin-top: 20px; margin-bottom: 50px">
    <x:form::form class="row" method="POST" :action="route('periodo.store')">
        <x:form::input type="hidden" name="calendarios_id" value="{{$calendario->id}}" />
        <div class="col-md-6">
            <x:form::input id="nome" name="nome" label="Nome: " :placeholder="false"/>
        </div>
        <div class="col-md-6">
            <x:form::input type="date" name="inicio" label="Data de Início: " />
            <x:form::input type="date" name="fim" label="Data de Fim: " />
        </div>
        <div class="col-12 mt-2">
            <x:form::button.link class="btn-secondary me-3" href="{{route('periodos', $calendario->id)}}">{{ __('Cancel') }}</x:form::button.link>
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