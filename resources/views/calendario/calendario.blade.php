@extends('layouts.main')

@section('title', 'CALENDARIOS')
@section('icon', 'calendar-grid-58')

@section('content')

    <h1>Calendários da Escola</h1>
    <h2>{{$escola->nome}}</h2>

    {{ $table }}
    
@endsection