@extends('principais.layout')

@section('title', 'RELATÓRIOS')
@section('icon', 'ni-paper-diploma')

@section('content')

<a href="{{route('home')}}">Home</a> >> Relatórios

<br/><br/>

<div style="text-align: center">
    <form action="{{route('relatorio.boletim')}}" method="get">
        <p>Turma: </p>
        <select name="opcao">
            <option value="boletim">Boletim por período</option>
            <option value="individual">Ficha individual</option>
            <option value="matricula">Ficha de matrícula</option>
            <option value="chamada">Lista de chamada</option>
        </select>
        <select name="curso">
            @foreach ($cursos as $curso)
                <option value="{{$curso->id}}">{{strtoupper($curso->nome)}} - {{strtoupper($curso->modalidade)}} ({{$curso->calendario->ano}})</option>
            @endforeach
        </select>
        <input type="submit" value="Consultar">
    </form>
    <br/>
    <form action="{{route('diarios')}}" method="get">
        <p>Professores: </p>
        <select>
            <option>Diário de Classe</option>
        </select>
        <select name="professor">
            @foreach ($professores as $professor)
                <option value="{{$professor->id}}">{{$professor->nome}}</option>
            @endforeach
        </select>
        <input type="submit" value="Acessar">
    </form>
</div>
@endsection