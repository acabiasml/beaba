@extends('principais.layout')

@section('title', 'PESSOAS')
@section('icon', 'ni-single-02')

@section('content')

<a href="{{route('home')}}">Home</a> >> Pessoas

{{ $table }}

@endsection