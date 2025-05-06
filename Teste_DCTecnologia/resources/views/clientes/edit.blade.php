@extends('layout')

@section('title', 'Editar clientes')

@section('content')
    <div class="d-flex justify-content-center align-itens-center border" style="height: 800px;">
        <div class="border p-5">
            <h1 class="text-center mb-5">Editar cliente</h1>
            <form action="{{route('clientes.update', $cliente->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <input type="text" class="form-control" name="name" id="" placeholder="Nome do cliente" value="{{$cliente->name}}">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="cpf" id="" placeholder="cpf do cliente" value="{{$cliente->cpf}}">
                </div>
                
                <a href="{{route('clientes.index')}}">Voltar</a>
                <button class="btn btn-success justify-content-center w-100" type="submit">Editar</button>
            </form>
        </div>
    </div>
@endsection