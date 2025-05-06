<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request){
        if($request){
            $name = $request->name;
            $produtos = Produto::where('name', 'like', '%'.$name.'%')->get();
        }else{
            $produtos = Produto::all();
        }
        
        return view('produtos.index', compact ('produtos'));
    }

    public function create(){
        return view('produtos.create');
    }

    public function store(Request $request){
        Produto::create($request->all());
        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    public function show($id){
        try{
            $produto = Produto::findOrFail($id);
            return view('produtos.index', compact ('produto'));
        }catch(\Exception $e){
            return redirect()->route('produtos.index')->with('error', 'Produto não encontrado');
        }
    }

    public function edit($id){
        try{
            $produto = Produto::findOrFail($id);
            return view('produtos.edit', compact ('produto'));
        }catch(\Exception $e){
            return redirect()->route('produtos.index')->with('error', 'Produto não encontrado');
        }
    }

    public function update(Request $request, $id){
        try{
            $produto = Produto::findOrFail($id);
            $produto->update($request->all());
            return redirect()->route('produtos.index');
        }catch(\Exception $e){
            return redirect()->route('produtos.index')->with('error', 'Produto não encontrado');
        }
    }

    public function destroy($id){
        try{
            $produto = Produto::findOrFail($id);
            $produto->delete($id);
            return redirect()->route('produtos.index');
        }catch(\Exception $e){
            return redirect()->route('produtos.index')->with('error', 'Produto não encontrado');
        }
    }
}
