<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        // Obtém o ID do usuário autenticado
        $usuarioId = auth()->id();

        // Filtra as categorias pelo usuario_id
        $categorias = Categoria::where('usuario_id', $usuarioId)->orderBy('id', 'asc')->get();

        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        Categoria::create([
            'usuario_id' => auth()->user()->id,  // Adiciona o ID do usuário autenticado
            'nome' => $request->nome,
        ]);

        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso!');
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $categoria->update([
            'nome' => $request->nome,
        ]);

        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoria excluída com sucesso!');
    }
}
