@extends('layout')

@section('content')
<div class="container">
    <h1 class="my-4">Editar Transação</h1>
    <form method="POST" action="{{ route('transacoes.update', $transacao->id) }}">
        @csrf
        @method('PUT')
        
        <!-- Tipo Field -->
        <div class="form-group">
            <label for="tipo">Tipo</label>
            <input type="text" class="form-control" id="tipo" name="tipo" value="{{ $transacao->tipo }}" required>
        </div>
        
        <!-- Valor Field -->
        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="number" step="0.01" class="form-control" id="valor" name="valor" value="{{ $transacao->valor }}" required>
        </div>
        
        <!-- Data Field -->
        <div class="form-group">
            <label for="data">Data</label>
            <input type="date" class="form-control" id="data" name="data" value="{{ $transacao->data }}" required>
        </div>
        
        <!-- Categoria Field -->
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <input type="text" class="form-control" id="categoria" name="categoria" value="{{ $transacao->categoria }}" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>
@endsection
