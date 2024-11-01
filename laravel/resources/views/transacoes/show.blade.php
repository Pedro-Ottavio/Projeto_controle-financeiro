@extends('layout')

@section('content')
    <div class="container">
        <h1>Transação: {{ $transacao->id }}</h1>
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Tipo: {{ $transacao->tipo }}</h5>
                <p class="card-text">Valor: {{ $transacao->valor }}</p>
                <p class="card-text">Data: {{ $transacao->data }}</p>
                <p class="card-text">Categoria: {{ $transacao->categoria }}</p>
                <p class="card-text">Descrição: {{ $transacao->descricao }}</p>
            </div>
        </div>
        
        <a href="{{ route('transacoes.index') }}" class="btn btn-primary mt-3">Voltar</a>

        
        <a href="{{ route('transacoes.edit', $transacao->id) }}" class="btn btn-warning btn-sm">Editar</a>
        <form method="POST" action="{{ route('transacoes.update', $transacao->id) }}">

            @csrf
            @method('GET')

            <button type="submit" class="btn btn-primary btn-sm">edd</button>
        </form>

        <form action="{{ route('transacoes.destroy', $transacao->id) }}" method="POST" style="display:inline">

            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
            
        </form>

        <!-- Blade file example
            -->
        <a href="{{ route('transacoes.edit', $transacao->id) }}" class="btn btn-warning btn-sm">Editar</a>
        <form action="{{ route('transacoes.destroy', $transacao->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
        </form>

    </div>
@endsection
