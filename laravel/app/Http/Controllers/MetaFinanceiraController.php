<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaFinanceira;

class MetaFinanceiraController extends Controller
{
    public function index()
    {
        $metas = MetaFinanceira::all();
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

        MetaFinanceira::create($request->all());
        return redirect()->route('metas.index')->with('success', 'Meta financeira criada com sucesso!');
    }

    public function edit(MetaFinanceira $meta)
    {
        return view('metas.edit', compact('meta'));
    }

    public function update(Request $request, MetaFinanceira $meta)
    {
        $request->validate([
            'tipo_meta' => 'required|string|max:255',
            'valor_meta' => 'required|numeric',
        ]);

        $meta->update($request->all());
        return redirect()->route('metas.index')->with('success', 'Meta financeira atualizada com sucesso!');
    }

    public function destroy(MetaFinanceira $meta)
    {
        $meta->delete();
        return redirect()->route('metas.index')->with('success', 'Meta financeira excluída com sucesso!');
    }
}
