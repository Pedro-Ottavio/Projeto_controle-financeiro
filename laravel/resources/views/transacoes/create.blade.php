
@extends('layout')

@section('content')
<div class="container">
    <h1 class="my-4">Criar Nova Transação</h1>
    <form method="POST" action="{{ route('transacoes.store') }}">
        @csrf
        <div class="form-group">
            <label for="tipo">Tipo</label>
            <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Tipo" required>
        </div>
        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="number" step="0.01" class="form-control" id="valor" name="valor" placeholder="Valor" required>
        </div>
        <div class="form-group">
            <label for="data">Data</label>
            <input type="date" class="form-control" id="data" name="data" placeholder="Data" required>
        </div>
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Categoria" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
        </div>
        <button type="submit" class="btn btn-primary">Criar</button>
    </form>
</div>
@endsection
