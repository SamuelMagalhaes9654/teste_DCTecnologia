@extends('layout')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Produtos</h1>

    <a href="{{ route('vendas.create') }}" class="btn btn-primary mb-3">Nova Venda</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            {{-- {{($vendas);}} --}}
            <tr>
                <th>ID</th>
                <th>Nome do vendedor</th>
                <th>Nome do cliente</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($vendas as $venda)
                @foreach ($venda->produtoVenda as $produtoVenda)
                    <tr>
                        <td>{{ $venda->id }}</td>
                        <td>{{ $venda->user->name }}</td>
                        <td>{{ $venda->cliente->name }}</td>
                        <td>{{ $produtoVenda->produto->name }}</td>
                        <td>{{ $produtoVenda->quantidade }}</td>
                        <td>{{ $produtoVenda->valor }}</td>
                        <td>
                            <a href="{{ route('vendas.edit', $venda->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('vendas.destroy', $venda->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta venda?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @empty
                <tr>
                    <td colspan="4">Nenhuma venda encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
