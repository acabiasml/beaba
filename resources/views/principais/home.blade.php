@extends('principais.layout')

@section('title', 'HOME')
@section('icon', 'ni-tv-2')

@section('content')
<p>
<h1>Aniversariantes do mês</h1>
    @foreach ($aniversariantes as $aniversariante)
       <p> {{$aniversariante->nome}} - {{$aniversariante->nascimento}}</p>
    @endforeach
</p>
@endsection