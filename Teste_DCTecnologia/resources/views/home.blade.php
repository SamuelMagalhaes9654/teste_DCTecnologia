@extends('layout')

@section('title', 'Home')
@if(auth()->check())
    @section('content')
    {{auth()->user()->id}}
    @endsection
@else

@endif