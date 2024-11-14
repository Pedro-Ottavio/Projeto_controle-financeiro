<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TransacaoController;
use App\Http\Controllers\MetaFinanceiraController;
use App\Http\Controllers\CategoriaController;



Route::get('/', function () {return view('welcome');});


Route::get('registro', [UsuarioController::class, 'registroForm'])->name('registroForm');
Route::post('registro', [UsuarioController::class, 'registrar'])->name('registrar') ;

Route::get('login', [UsuarioController::class, 'loginForm'])->name('loginForm');
Route::post('login', [UsuarioController::class, 'login'])->name('login');

Route::post('logout', [UsuarioController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {

    Route::resource('transacoes', TransacaoController::class);
    Route::get('transacoes/relatorio/{usuario_id}', [TransacaoController::class, 'relatorio'])->name('transacoes.relatorio');


    Route::resource('metas', MetaFinanceiraController::class);
    
    Route::resource('categorias', CategoriaController::class);
});

// Rota para a página de listagem
Route::get('listagem', function () {
    return view('listagem');
})->name('listagem');
