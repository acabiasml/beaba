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
<p>Período de {{date('d-m-Y', strtotime($periodo->inicio))}} até {{date('d-m-Y', strtotime($periodo->fim))}}.</p>

<h3 style="background-color: #F1E6B2; color: #6B3D2E; text-align: center">Inserir conteúdo</h3>

<div>
    <form method="GET" action="{{route('diario.store')}}">
        <div class="row">
        @csrf
            <input type="hidden" name="periodo" value="{{$periodo->id}}" />
            <input type="hidden" name="componente" value="{{$componente->id}}" />

            <div class="col-md-6">
                <div class="form-group">
                    <label for="dia">Data: </label>
                    <input class="form-control" type="date" name="dia">
                    
                    <label for="geminada">Tipo: </label>
                    <select class="form-control" name="geminada">
                        <option value="1">Simples</option>
                        <option value="2">Geminada</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="conteudo">Conteúdo: </label>
                    <input class="form-control" type="text" maxlength="255" name="conteudo" class="form-control">
                    <br/>
                    <div style="text-align: center"><button  class="btn btn-warning" type="submit">Registrar</button></div>
                </div>
            </div>
        </div>
    </form>
</div>

<br/>

<h3 style="background-color: #F1E6B2; color: #6B3D2E; text-align: center">Conteúdos registrados | {{$somabimestre}} aulas nesse bimestre</h3>
    <table class="table table-responsive-sm">
    <thead>
        <tr>
            <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7" style="text-align: center" scope="col">Data</th>
            <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7" style="text-align: center" scope="col">Nº</th>
            <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7" style="text-align: center" scope="col">Conteúdo</th>
            <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7" style="text-align: center">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($registrados as $registrado)
            <tr>
                <td style="text-align: center">{{date('d-m-Y', strtotime($registrado->data))}}</td>
                <td style="text-align: center">{{$registrado->geminada}}</td>
                <td>{{$registrado->conteudo}}</td>
                <td style="text-align: center">
                    <form method="POST">
                    @csrf
                        <input type="hidden" name="diario" value="{{$registrado->id}}" />
                        <input type="hidden" name="componente" value="{{$componente->id}}" />
                        <input type="hidden" name="periodo" value="{{$periodo->id}}" />
                        <button type="submit" class="btn btn-danger btn-sm" formaction="{{route('diario.destroy')}}">Excluir</button>
                        <button type="submit" class="btn btn-info btn-sm" formaction="{{route('frequencias')}}">Frequências</button>
                    </form>
                <td>
            </tr>
        @endforeach
    </tbody>
    </table>

@endsection