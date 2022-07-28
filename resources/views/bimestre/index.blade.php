@extends('principais.layout')

@section('title', 'BIMESTRES')
@section('icon', 'ni-calendar-grid-58')

@section('content')

    <h1>Bimestres | {{$calendario->nome}} | {{$calendario->ano}}</h1>

    {{$table}}
    
@endsection