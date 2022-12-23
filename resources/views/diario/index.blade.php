@extends('principais.layout')

@section('title', 'DIÁRIOS')
@section('icon', 'ni-collection')

@section('content')

<a href="{{route('home')}}">Home</a> >> Diários

<br/><br/>

<h1><small class="text-muted">Turmas ativas de</small> {{$profissional->nome}}</h1>

    <table class="table table-responsive-sm">
    <thead>
        <tr>
            <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7" style="text-align: center" scope="col">Nome</th>
            <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7" style="text-align: center" scope="col">Horas</th>
            <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7" style="text-align: center" scope="col">Curso</th>
            <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7" style="text-align: center" scope="col">Lançamentos</th>
            <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7" style="text-align: center" scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($doProfessor as $key)
            <tr>
                <td style="text-align: center">{{$key["componente_nome"]}}</td>
                <td style="text-align: center">{{$key["componente_cumprido"]}}/{{$key["componente_horas"]}}</td>
                <td style="text-align: center">{{$key["componente_nome_curso"]}} - {{$key["componente_status_curso"]}}</td>
                @if ($key["componente_status_curso"] == "iniciado")
                    <td>
                        Período: 
                        <form method="GET">
                            @csrf

                            <input type="hidden" name="componente" value="{{$key['componente_id']}}" />

                            <select class="form-control form-control-sm" style="margin-bottom: -30px" name="periodo">
                                @foreach ($key["componente_periodos_curso"] as $periodo)
                                    <option value="{{$periodo->id}}">{{$periodo->nome}}</option>
                                @endforeach
                            </select>
                            <br/><br/>
                            <button class="btn btn-info btn-sm" type="submit" formaction="{{route('medias')}}">Notas</button>
                            <button class="btn btn-success btn-sm" type="submit" formaction="{{route('diario.ver')}}">Conteúdos e Frequência</button>
                        </form>
                    </td>

                    <td  style="text-align: center">
                        <form method="GET" action="{{route('diario.print')}}">
                            @csrf
                            <input type="hidden" name="componente" value="{{$key['componente_id']}}" />
                            <br/>
                            <button class="btn btn-warning btn-sm" type="submit">Imprimir</button>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
    </table>

@endsection