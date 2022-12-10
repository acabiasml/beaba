@extends('principais.layout')

@section('title', 'FREQUÊNCIAS')
@section('icon', 'ni-collection')

@section('content')

<a href="{{route('diarios')}}">{{$componente->nome}} - {{$curso->nome}}</a> >> Frequências

<br/><br/>

<h1>Frequência do dia {{date('d-m-Y', strtotime($chamada->data))}}</h1>

    <table class="table table-responsive-sm">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col"  style="text-align: center">Chamada</th>
            <th scope="col" style="text-align: center">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($frequencias as $frequencia)
            <tr>
                <td>{{$frequencia["nome"]}}</td>
                <td style="text-align: center">{{$frequencia["chamada"]}}</td>
                <td  style="text-align: center">
                    <form method="POST">
                    @csrf
                        <input type="hidden" name="aluno" value="{{$frequencia['id']}}" />
                        <input type="hidden" name="dia" value="{{$chamada->id}}" />
                        <button type="submit" formaction="{{route('frequencia.update')}}">Alterar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>

@endsection