<?php

namespace App\Http\Controllers;

use App\Models\Transacao;
use Illuminate\Http\Request;

class TransacaoController extends Controller
{
    public function index()
    {
        // Obtém o ID do usuário autenticado
        $usuarioId = auth()->id();

        // Filtra as transações pelo usuario_id
        $transacoes = Transacao::where('usuario_id', $usuarioId)->get();

        return view('transacoes.index', compact('transacoes'));
    }
    
    public function create()
    {
        return view('transacoes.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required',
            'valor' => 'required|numeric',
            'data' => 'required|date',
            'categoria' => 'required',
        ]);

        $transacao = new Transacao($request->all());
        $transacao->usuario_id = auth()->id();
        $transacao->save();

        return redirect()->route('transacoes.index')->with('success', 'Transação adicionada com sucesso!');
    }

    public function edit($id)
    {
        $transacao = Transacao::findOrFail($id);
        return view('transacoes.edit', compact('transacao'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo' => 'required',
            'valor' => 'required|numeric',
            'data' => 'required|date',
            'categoria' => 'required',
        ]);

        $transacao = Transacao::findOrFail($id);
        $transacao->update($request->all());

        return redirect()->route('transacoes.index')->with('success', 'Transação atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $transacao = Transacao::findOrFail($id);
        $transacao->delete();

        return redirect()->route('transacoes.index')->with('success', 'Transação excluída com sucesso!');
    }
}
