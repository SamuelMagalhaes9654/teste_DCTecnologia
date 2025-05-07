@extends('layout')

@section('title', 'Cadastrar clientes')

@section('content')
    <div class="d-flex justify-content-center align-itens-center border" style="height: 800px;">
        <div class="border p-5">
            <h1 class="text-center mb-5">Cadastrar cliente</h1>
            <form action="{{route('clientes.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" name="name" id="" placeholder="Nome do cliente">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="cpf" id="" placeholder="cpf do cliente">
                </div>
                
                <a href="{{route('clientes.index')}}">Voltar</a>
                <button class="btn btn-success justify-content-center w-100" type="submit">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection