
@extends('layout')

@section('content')
<div class="form-container">
    <h1 class="my-4">Criar Nova Meta Financeira</h1>
    <div class="user-form">

        <form method="POST" action="{{ route('metas.store') }}">
            @csrf
            <div class="form-group">
                <label for="tipo_meta">Tipo de Meta</label>
                <input type="text" class="form-control" id="tipo_meta" name="tipo_meta" placeholder="Tipo de Meta" required>
            </div>
            <div class="form-group">
                <label for="valor_meta">Valor</label>
                <input type="number" step="0.01" class="form-control" id="valor_meta" name="valor_meta" placeholder="Valor" required>
            </div>
            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    </div>
</div>
@endsection
