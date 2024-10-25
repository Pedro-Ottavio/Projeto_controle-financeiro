
@extends('layout')

@section('content')
<div class="container">
    <h1 class="my-4">Criar Nova Categoria</h1>
    <form method="POST" action="{{ route('categorias.store') }}">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da Categoria" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar</button>
    </form>
</div>
@endsection
