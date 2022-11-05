@extends('principais.layout')

@section('title', 'ESCOLA')
@section('icon', 'ni-shop')

@section('content')

<a href="{{route('home')}}">Home</a> >> Escolas

{{ $table }}

@endsection