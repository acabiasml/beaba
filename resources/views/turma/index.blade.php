@extends('principais.layout')

@section('title', 'TURMA')
@section('icon', 'ni-calendar-grid-58')

@section('content')

<a href="{{route('escolas', $escola->id)}}">{{$escola->nome}}</a> >> 
<a href="{{route('calendarios', $calendario->id)}}">{{$calendario->nome}} - {{$calendario->ano}}</a> >>
<a href="{{route('cursos', $curso->id)}}">{{$curso->nome}}</a> >> 
Turma

<br/><br/>
<h3 style="background-color: #F1E6B2; color: #6B3D2E; text-align: center">Matriculados</h3>

{{$table}}

<br/><h3 style="background-color: #F1E6B2; color: #6B3D2E; text-align: center">Nova Matrícula</h3>

<div class="container-fluid" style="margin-top: 20px; margin-bottom: 50px"> 
    <x:form::form class="row" method="POST" :action="route('turma.store')" >
        <x:form::input type="hidden" name="cursos_id" value="{{$curso->id}}" />
        <div class="col-sm">
            <x:form::select name="users_id" label="Nome: " :options="$pessoas" :placeholder="false"/>
        </div>
        <div class="col-sm">
            <x:form::input type="date" name="datamatricula" label="Data: " />
        </div>
        <div class="col-sm" style="text-align: center">
            <br />
            <x:form::button.submit>Incluir</x:form::button.submit>
        </div>
    </x:form::form>
</div>

@endsection