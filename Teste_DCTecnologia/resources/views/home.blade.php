@extends('layout')

@section('title', 'Home')
@if(auth()->check())
    @section('content')
    {{auth()->user()->name}}
    @endsection
@else

@endif