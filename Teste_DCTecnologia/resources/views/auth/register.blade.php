@extends('layout')

@section('title', 'Register')

@section('content')
    <div class="d-flex justify-content-center align-itens-center border" style="height: 800px;">
        <div class="border p-5">
            <h1 class="text-center mb-5">Cadastro</h1>
            <form action="{{route('register.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" name="name" id="" placeholder="Digite seu nome">
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" name="email" id="" placeholder="Digite seu email">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password" id="" placeholder="Digite sua senha">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password_confirmation" id="" placeholder="Confirme sua senha">
                </div>
                
                <a href="{{route('login')}}">Fazer Login se ja estiver cadastrado</a>
                <button class="btn btn-success justify-content-center w-100" type="submit">Registrar</button>
            </form>
        </div>
    </div>
@endsection