@extends('principais.layout')

@section('title', 'NOVO CALENDÁRIO')
@section('icon', 'ni-calendar-grid-58')

@section('content')

<a href="{{route('escolas', $escola->id)}}">{{$escola->nome}}</a> >> 
Calendários <br/><br/>
<h1>Novo</h1>

<div class="container-fluid" style="margin-top: 20px; margin-bottom: 50px">
    <x:form::form class="row" method="POST" :action="route('calendario.store')">
        <x:form::input type="hidden" name="escolas_id" value="{{$escola->id}}" />
        <div class="col-md-6">
            <x:form::input id="nome" name="nome" label="Nome: " :placeholder="false"/>
        </div>
        <div class="col-md-6">
            <x:form::input type="number" name="ano" label="Ano: " :placeholder="false"/>
        </div>
        <div class="col-12 mt-2">
            <x:form::button.link class="btn-secondary me-3" href="{{route('calendarios', $escola->id)}}">{{ __('Cancel') }}</x:form::button.link>
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