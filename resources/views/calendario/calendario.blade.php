@extends('layouts.main')

@section('title', 'CALENDÁRIOS')
@section('icon', 'ni-calendar-grid-58')

@section('content')

    <h1>Calendários | {{$escola}}</h1>

    {{$table}}
    
@endsection