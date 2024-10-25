<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function registroForm()
    {
        return view('usuario.registroForm');
    }

    public function registrar(Request $request)
    {
        #var_dump($request);
        #exit();
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'senha' => 'required|string|min:5',
        ]);

        $usuario = new Usuario;
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->senha = bcrypt($request->senha);
        $usuario->save();

        return redirect()->route('loginForm');
    }

    public function loginForm()
    {
        return view('usuario.loginForm');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'senha' => ['required'],
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->senha])) {
            $request->session()->regenerate();
            return redirect()->intended('/transacoes'); // Redireciona para transações após login
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
