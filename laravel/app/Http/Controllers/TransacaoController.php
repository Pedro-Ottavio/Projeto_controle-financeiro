<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transacao;

class TransacaoController extends Controller
{
    public function index()
    {
        $transacoes = Transacao::all();
        return view('transacoes.index', compact('transacoes'));
    }

    public function create()
    {
        return view('transacoes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'data' => 'required|date',
            'categoria' => 'required|string|max:255',
        ]);

        Transacao::create($request->all());
        return redirect()->route('transacoes.index')->with('success', 'Transação criada com sucesso!');
    }

    public function edit(Transacao $transacao)
    {
        return view('transacoes.edit', compact('transacao'));
    }

    public function update(Request $request, Transacao $transacao)
    {
        $request->validate([
            'tipo' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'data' => 'required|date',
            'categoria' => 'required|string|max:255',
        ]);

        $transacao->update($request->all());
        return redirect()->route('transacoes.index')->with('success', 'Transação atualizada com sucesso!');
    }

    public function destroy(Transacao $transacao)
    {
        $transacao->delete();
        return redirect()->route('transacoes.index')->with('success', 'Transação excluída com sucesso!');
    }
}
