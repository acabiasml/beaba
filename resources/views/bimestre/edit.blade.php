@extends('principais.layout')

@section('title', 'EDITAR PERÍODO')
@section('icon', 'ni-watch-time')

@section('content')

<div class="container-fluid" style="margin-top: 20px; margin-bottom: 50px">
    <h1 style="text-align: center">Editar Período | Calendário: {{$calendario->nome}}</h1> 
    <h1 style="text-align: center">{{$escola->nome}}</h1> <br />

    <x:form::form :bind="$bimestre" class="row" method="POST" :action="route('bimestre.update')">
        <div class="col-md-6">
            <x:form::input type="hidden" name="calendarios_id" />
            <x:form::input type="hidden" name="id" />
            <x:form::input id="nome" name="nome" label="Nome" />
        </div>
        <div class="col-md-6">
            <x:form::input type="date" name="inicio" label="Início" />
        </div>
        <div class="col-md-6">
            <x:form::input type="date" name="fim" label="Fim" />
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