@extends('layouts.main')

@section('title', 'DADOS DE CADASTRO')
@section('icon', 'ni-single-02')

@section('content')

    @if($usuario->nomesocial !== NULL)
        <h1 style="text-align: center">{{$usuario->nomesocial}}</h1>
    @else
        <h1 style="text-align: center">{{$usuario->nome}}</h1>
    @endif

    <div class="container-fluid" style="margin-top: 50px; margin-bottom: 50px">
        <div class="row">
            <div class="col-sm">
                <p>E-mail: {{$usuario->email}}</p>
            </div>
            <div class="col-sm">
                <p>Data de nascimento: {{$usuario->nascimento}}</p>
            </div>
        </div>
    </div>
    <a href="{{route('user.edit', $usuario->id)}}">
        <button type="button" class="btn btn-primary">Editar</button>
    </a>
@endsection