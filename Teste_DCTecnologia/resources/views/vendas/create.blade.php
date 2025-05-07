@extends('layout')

@section('title', 'Cadastrar venda')

@section('content')
<div class="d-flex justify-content-center align-items-center border" style="min-height: 800px;">
    <div class="border p-5 w-100" style="max-width: 800px;">
        <h1 class="text-center mb-4">Cadastrar Venda</h1>

        <form action="{{ route('vendas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="cliente_id" class="form-label">Cliente (opcional)</label>
                <select name="cliente_id" class="form-control">
                    <option value="">-- Selecione --</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                    @endforeach
                </select>
            </div>

            <h5>Produtos</h5>
            <div id="itens" class="mb-3">
                <div class="row mb-2 item-venda">
                    <div class="col-md-5">
                        <select name="produtos[0][produto_id]" class="form-control" required>
                            <option value="">Produto</option>
                            @foreach($produtos as $produto)
                                <option  value="{{ $produto->id }}">{{ $produto->name }} - R$ {{ $produto->valor }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="number" name="produtos[0][quantidade]" class="form-control" placeholder="Quantidade" min="1" required value="">
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="produtos[0][valor]" class="form-control" placeholder="Valor" step="0.01" required>
                    </div>
                    <div class="col-md-4 mt-2">
                        <input type="text" class="form-control preco-total" placeholder="Valor Total" readonly>
                    </div>
                </div>
            </div>
            <button type="button" id="add-item" class="btn btn-sm btn-outline-primary mb-3">Adicionar item</button>

            <h5>Parcelas</h5>
            <div id="parcelas" class="mb-3">
                <div class="row mb-2 parcela-item">
                    <div class="col-md-4">
                        <input type="number" name="parcelas[0][numero_parcela]" class="form-control" placeholder="Parcela Nº" min="1" required>
                    </div>
                    <div class="col-md-4">
                        <input type="date" name="parcelas[0][data_vencimento]" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="parcelas[0][valor]" class="form-control" placeholder="Valor" step="0.01" required>
                    </div>
                </div>
            </div>
            <button type="button" id="add-parcela" class="btn btn-sm btn-outline-primary mb-4">Adicionar parcela</button>

            <div class="d-flex justify-content-between">
                <a href="{{ route('vendas.index') }}" class="btn btn-secondary">Voltar</a>
                <button type="submit" class="btn btn-success">Cadastrar Venda</button>
            </div>
        </form>
    </div>
</div>

<script>

</script>
@endsection