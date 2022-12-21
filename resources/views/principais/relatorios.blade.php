@extends('principais.layout')

@section('title', 'RELATÓRIOS')
@section('icon', 'ni-paper-diploma')

@section('content')

<a href="{{route('home')}}">Home</a> >> Relatórios

<br/><br/>

<div style="text-align: center">
    <form action="#">
        <p>Turma: </p>
        <select>
            <option>Boletim por período</option>
            <option>Ficha individual</option>
            <option>Ficha de matrícula</option>
            <option>Lista de chamada</option>
        </select>
        <select>
            <option>Nome da turma</option>
        </select>
        <button>Consultar</button>
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