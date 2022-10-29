@extends('principais.layout')

@section('title', 'COMPONENTES')
@section('icon', 'ni-calendar-grid-58')

@section('content')

<h1>Componentes Curriculares | {{$curso->nome}}</h1>

{{$table}}

@endsection