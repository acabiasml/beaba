@extends('principais.layout')

@section('title', 'CURSOS')
@section('icon', 'ni-calendar-grid-58')

@section('content')

<h1>Períodos | {{$calendario->nome}} | {{$calendario->ano}}</h1>

{{$table}}

@endsection