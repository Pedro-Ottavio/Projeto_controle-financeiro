<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaFinanceira;

class MetaFinanceiraController extends Controller
{
    public function index()
    {
        // Obtém o ID do usuário autenticado
        $usuarioId = auth()->id();

        // Filtra as metas financeiras pelo usuario_id
        $metas = MetaFinanceira::where('usuario_id', $usuarioId)->get();

        return view('metas.index', compact('metas'));
    }

    public function create()
    {
        return view('metas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_meta' => 'required|string|max:255',
            'valor_meta' => 'required|numeric',
        ]);

        MetaFinanceira::create([
            'usuario_id' => auth()->user()->id,
            'tipo_meta' => $request->tipo_meta,
            'valor_meta' => $request->valor_meta,
            'status' => 'não atingida',
        ]);

        return redirect()->route('metas.index')->with('success', 'Meta financeira criada com sucesso!');
    }

    public function edit(MetaFinanceira $meta)
    {
        return view('metas.edit', compact('meta'));
    }
}
