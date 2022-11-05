@extends('principais.layout')

@section('title', 'CALENDÁRIOS ')
@section('icon', 'ni-calendar-grid-58')

@section('content')

<a href="{{route('escolas', $escola->id)}}">{{$escola->nome}}</a> >> Calendários

{{$table}}

@endsection