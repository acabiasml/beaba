@extends('principais.layout')

@section('title', 'EDITAR BIMESTRE')
@section('icon', 'ni-watch-time')

@section('content')

<div class="container-fluid" style="margin-top: 20px; margin-bottom: 50px">
    <h1 style="text-align: center">Editar Bimestre | {{$escola}}</h1> <br />

    <x:form::form :bind="$calendario" class="row" method="POST" :action="route('calendario.update')">
        <div class="col-md-6">
            <x:form::input type="hidden" name="escolas_id" />
            <x:form::input type="hidden" name="id" />
            <x:form::input id="nome" name="nome" label="Nome" />
        </div>
        <div class="col-md-6">
            <x:form::input name="ano" label="Ano" />
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