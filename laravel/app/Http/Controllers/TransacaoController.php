<?php

namespace App\Http\Controllers;

use App\Models\Transacao;
use Illuminate\Http\Request;
use App\Models\Categoria;


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
        $categorias = Categoria::all(); // Fetch all categories
        return view('transacoes.create', compact('categorias'));
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
    $categorias = Categoria::all(); // Fetch all categories
    return view('transacoes.edit', compact('transacao', 'categorias'));
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

    public function relatorio(Request $request, $usuario_id){
        
        // Verifique se o usuário autenticado é o mesmo que está tentando acessar o relatório
        if (auth()->id() != $usuario_id) {
            abort(403);
        }

        // Inicie a query para buscar as transações do usuário
        $transacoes = Transacao::where('usuario_id', $usuario_id);

        // Verifique se há filtros de data e aplique-os
        if ($request->has('data_inicio') && $request->has('data_fim')) {
            $data_inicio = $request->input('data_inicio');
            $data_fim = $request->input('data_fim');
            
            // Adicione o filtro de data
            $transacoes->whereBetween('data', [$data_inicio, $data_fim]);
        }

        // Clone a consulta para calcular os totais de Credito e Debito
        $transacoes_credito = (clone $transacoes)->where('tipo', 'Credito')->sum('valor');
        $transacoes_debito = (clone $transacoes)->where('tipo', 'Debito')->sum('valor');

        // Calcule a diferença
        $diferenca = $transacoes_credito - $transacoes_debito;

        // Execute a consulta para obter a lista completa de transações
        $transacoes = $transacoes->get();

        // Retorne a view com as transações, os totais, e a diferença
        return view('transacoes.relatorio', compact('transacoes', 'transacoes_credito', 'transacoes_debito', 'diferenca'));
}

}        
