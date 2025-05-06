@extends('layout')

@section('title', 'Login')

@section('content')
    <div class="d-flex justify-content-center align-itens-center border" style="height: 800px;">
        <div class="border p-5">
            <h1 class="text-center mb-5">Login</h1>
            <form action="{{route('login.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="email" class="form-control" name="email" id="" placeholder="Digite seu email">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password" id="" placeholder="Digite sua senha">
                </div>
                
                <a href="{{route('register')}}">cadastre-se se ainda não tiver conta</a>
                <button class="btn btn-success justify-content-center w-100" type="submit">Fazer Login</button>
            </form>
        </div>
    </div>
@endsection