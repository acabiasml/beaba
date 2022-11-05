@extends('principais.layout')

@section('title', 'COMPONENTES CURRICULARES')
@section('icon', 'ni-calendar-grid-58')

@section('content')

<a href="{{route('escolas', $escola->id)}}">{{$escola->nome}}</a> >> 
<a href="{{route('calendarios', $calendario->id)}}">{{$calendario->nome}} - {{$calendario->ano}}</a> >>
<a href="{{route('cursos', $curso->id)}}">{{$curso->nome}}</a> >> 
Componentes

{{$table}}

@endsection