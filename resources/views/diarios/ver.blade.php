@extends('principais.layout')

@section('title', 'CONTEÚDOS')
@section('icon', 'ni-collection')

@section('content')

<a href="{{route('diarios')}}">{{$componente->nome}} - {{$curso->nome}}</a> >> Conteúdos

<br/><br/>

@if(! empty(\Request::get('errim')))
    <div style="background-color: red; text-align: center; color: white">"Falha ao registrar. A data informada está fora do limite para esse bimestre." </div><br/>
@endif

<h1>{{$periodo->nome}}</h1>

<h3 style="background-color: #F1E6B2; color: #6B3D2E; text-align: center">Inserir conteúdo</h3>

<div>
    <form method="GET" action="{{route('diarios.store')}}">
    @csrf
        <input type="hidden" name="periodo" value="{{$periodo->id}}" />
        <input type="hidden" name="componente" value="{{$componente->id}}" />

        <label for="dia">Data: </label>
            <input type="date" name="dia">
        
        <label for="geminada">Tipo: </label>

        <select name="geminada">
            <option value="0">Simples</option>
            <option value="1">Geminada</option>
        </select>

        <br/>
        <label for="conteudo">Conteúdo: </label>
            <input type="text" maxlength="255" name="conteudo" class="form-control">
        <br/>
        <div style="text-align: center">
            <button type="submit">Registrar</button>
        </div>
    </form>
</div>

<br/>

<h3 style="background-color: #F1E6B2; color: #6B3D2E; text-align: center">Conteúdos registrados</h3>
    <table class="table table-responsive-sm">
    <thead>
        <tr>
            <th scope="col">Data</th>
            <th scope="col">Conteúdo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($registrados as $registrado)
            <tr>
                <td>{{date('d-m-Y', strtotime($registrado->data))}}</td>
                <td>{{$registrado->conteudo}}</td>
            </tr>
        @endforeach
    </tbody>
    </table>

@endsection