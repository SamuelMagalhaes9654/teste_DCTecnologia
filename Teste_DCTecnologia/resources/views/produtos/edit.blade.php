@extends('layout')

@section('title', 'Editar produtos')

@section('content')
    <div class="d-flex justify-content-center align-itens-center border" style="height: 800px;">
        <div class="border p-5">
            <h1 class="text-center mb-5">Editar produto</h1>
            <form action="{{route('produtos.update', $produto->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <input type="text" class="form-control" name="name" id="" placeholder="Nome do cliente" value="{{$produto->name}}">
                </div>
                <div class="mb-3">
                    <input type="number" step="0.01" class="form-control" name="valor" id="" placeholder="Valor do produto" value="{{$produto->valor}}">
                </div>
                
                <a href="{{route('produtos.index')}}">Voltar</a>
                <button class="btn btn-success justify-content-center w-100" type="submit">Editar</button>
            </form>
        </div>
    </div>
@endsection