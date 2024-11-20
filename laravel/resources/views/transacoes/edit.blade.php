@extends('layout')

@section('content')
<div class="form-container">
    <h1 class="my-4">Editar Transação</h1>
    <form method="POST" action="{{ route('transacoes.update', $transacao->id) }}">
        @csrf
        @method('PUT')
        <div class="user-form">

            <!-- Tipo Field -->
            <div class="form-group" style="font-size: 20px">
                <label for="tipo">Tipo</label><br>
                <div class="form-check">
                    <input type="radio" id="entrada" name="tipo" value="Credito" required
                    style="margin-left: 20px">
                    <label for="Credito" style="color: rgba(10, 137, 10, 0.87)">Credito</label>
                    <input type="radio" id="saida" name="tipo" value="Debito"
                    style="margin-left: 20px">
                    <label for="Debito" style="color: red">Debito</label>
                </div>
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
                <select class="form-control" id="categoria" name="categoria" required>
                    <option value="" disabled selected>Selecione uma Categoria</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->nome }}">{{ $categoria->nome }}</option>
                    @endforeach
                </select>
            </div>
            
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </div>

    </form>
</div>
@endsection