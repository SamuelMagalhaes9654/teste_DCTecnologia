<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Parcela;
use App\Models\Produto;
use App\Models\ProdutoVenda;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function index(){
        $vendas = Venda::with('user', 'cliente', 'produtoVenda', 'parcela')->get();
        return view('vendas.index', compact('vendas'));
    }

    public function create(){
        $clientes = Cliente::all();
        $produtos = Produto::all();
        $parcelas = [];
        return view('vendas.create', compact('clientes', 'produtos'));
    }

    public function store(Request $request){
        $user_id = auth()->user()->id;

        $venda = Venda::create([
            'user_id'=> $user_id,
            'cliente_id'=> $request->cliente_id
        ]);

        foreach($request->produtos as $produto){
            ProdutoVenda::create([
                'venda_id'=>$venda->id,
                'produto_id'=> $produto['produto_id'],
                'quantidade'=> $produto['quantidade'],
                'valor' => $produto['valor']
            ]);
        }

        foreach($request->parcelas as $parcela){
            Parcela::create([
                'venda_id'=>$venda->id,
                'numero_parcela'=> $parcela['numero_parcela'],
                'data_vencimento'=> $parcela['data_vencimento'],
                'valor' => $parcela['valor']
            ]);
        }

        return redirect()->route('vendas.index')->with('success', 'Venda criado com sucesso!');
    }

    public function edit($id){
        $venda = Venda::with('parcelas')->findOrFail($id);
        $clientes = Cliente::all();
        $produtos = Produto::all();
        $parcelas = $venda->parcelas;

        return view('vendas.edit', compact('venda', 'clientes', 'produtos', 'parcelas'));
    }

    public function update(){
        
    }

    public function destroy($id){
        try{
            $venda = Venda::findOrFail($id);
            $venda->produtoVenda()->delete();
            $venda->parcela()->delete();
            $venda->delete();
            return redirect()->route('vendas.index');
        }catch(\Exception $e){
            return redirect()->route('vendas.index')->with('error', 'Venda não encontrado');
        }
        
    }
}
