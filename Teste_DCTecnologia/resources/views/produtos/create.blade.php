@extends('layout')

@section('title', 'Cadastrar produtos')

@section('content')
    <div class="d-flex justify-content-center align-itens-center border" style="height: 800px;">
        <div class="border p-5">
            <h1 class="text-center mb-5">Cadastrar produtos</h1>
            <form action="{{route('produtos.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" name="name" id="" placeholder="Nome do produto">
                </div>
                <div class="mb-3">
                    <input type="number" step="0.01" class="form-control" name="valor" id="" placeholder="Valor do produto">
                </div>
                
                <a href="{{route('produtos.index')}}">Voltar</a>
                <button class="btn btn-success justify-content-center w-100" type="submit">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection