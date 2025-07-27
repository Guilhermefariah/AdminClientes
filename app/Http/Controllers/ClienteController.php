<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $query = Cliente::query();

        if ($request->pesquisar) {
            $clientes = Cliente::where('nome', 'like', '%' . $request->pesquisar . '%')->get();
        }

        $clientes = $query->orderBy('nome', 'desc')->paginate(10);

        return view('clientes.index', [
            'clientes' => $clientes
        ]);
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nome' => 'required|string|max:150',
                'cpf' => 'required|string|size:14|unique:clientes,cpf',
                'data_nascimento' => 'required|date',
                'renda_familiar' => 'required|numeric|min:0',
            ]);

            $validated['data_cadastro'] = now();
            Cliente::create($validated);

            Log::info('Novo cliente cadastrado: ',  $validated);

            return redirect()->route('clientes.index')->with('success', 'Novo cliente cadastrado!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Ocorreu um erro ao salvar os dados');
        }
    }


    public function show(Cliente $cliente)
    {
        return view('clientes.show', [
            'cliente' => $cliente
        ]);
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', [
            'cliente' => $cliente
        ]);
    }

    public function update(Request $request, Cliente $cliente)
    {
        try {
            $validated = $request->validate([
                'nome' => 'required|string|max:150',
                'cpf' => 'required|string|size:14|unique:clientes,cpf,' . $cliente->id,
                'data_nascimento' => 'required|date',
                'renda_familiar' => 'nullable|numeric|min:0',
            ]);

            $validated['data_cadastro'] = now();
            $cliente->update($validated);

            Log::info('Cliente atualizado: ',  $validated);

            return redirect()->route('clientes.index')->with('success', 'Cliente atualizado!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Ocorreu um erro ao atualizar os dados');
        }
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente removido!');
    }
}
