@extends('principais.layout')

@section('title', 'DIÁRIOS')
@section('icon', 'ni-collection')

@section('content')

<a href="{{route('home')}}">Home</a> >> Diários

<br/><br/>

<h1>Suas turmas </h1>

    <table class="table table-responsive-sm">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Horas</th>
        <th scope="col">Curso</th>
        <th scope="col">Lançamentos</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($doProfessor as $key)
            <tr>
                <th scope="row">{{$key["componente_id"]}}</th>
                <td>{{$key["componente_nome"]}}</td>
                <td>{{$key["componente_horas"]}}</td>
                <td>{{$key["componente_nome_curso"]}} - {{$key["componente_status_curso"]}}</td>
                @if ($key["componente_status_curso"] == "iniciado")
                    <td>
                        Período: 
                        <form method="POST">
                            @csrf

                            <input type="hidden" name="componente" value="{{$key['componente_id']}}" />

                            <select name="periodo">
                                @foreach ($key["componente_periodos_curso"] as $periodo)
                                    <option value="{{$periodo->id}}">{{$periodo->nome}}</option>
                                @endforeach
                            </select>
                            <br/><br/>
                            <button type="submit" formaction="{{route('medias')}}">Notas</button>
                            <button type="submit" formaction="{{route('frequencias')}}">Conteúdos e Frequência</button>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
    </table>

@endsection