<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $request){
        if($request){
            $name = $request->name;
            $clientes = Cliente::where('name', 'like', '%'.$name.'%')->get();
        }else{
            $clientes = Cliente::all();
        }
        
        return view('clientes.index', compact ('clientes'));
    }

    public function create(){
        return view('clientes.create');
    }

    public function store(Request $request){
        Cliente::create($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente criado com sucesso!');
    }

    public function show($id){
        try{
            $cliente = Cliente::findOrFail($id);
            return view('clientes.index', compact ('cliente'));
        }catch(\Exception $e){
            return redirect()->route('clientes.index')->with('error', 'Cliente não encontrado');
        }
    }

    public function edit($id){
        try{
            $cliente = Cliente::findOrFail($id);
            return view('clientes.edit', compact ('cliente'));
        }catch(\Exception $e){
            return redirect()->route('clientes.index')->with('error', 'Cliente não encontrado');
        }
    }

    public function update(Request $request, $id){
        try{
            $cliente = Cliente::findOrFail($id);
            $cliente->update($request->all());
            return redirect()->route('clientes.index');
        }catch(\Exception $e){
            return redirect()->route('clientes.index')->with('error', 'Cliente não encontrado');
        }
    }

    public function destroy($id){
        try{
            $cliente = Cliente::findOrFail($id);
            $cliente->delete($id);
            return redirect()->route('clientes.index');
        }catch(\Exception $e){
            return redirect()->route('clientes.index')->with('error', 'Cliente não encontrado');
        }
    }

}
