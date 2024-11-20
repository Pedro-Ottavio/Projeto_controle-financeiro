
@extends('layout')

@section('content')
<div class="form-container">
    <h1 class="my-4">Criar Nova Categoria</h1>
    <div class="user-form">

        <form method="POST" action="{{ route('categorias.store') }}">
            @csrf
            <div class="form-group">
                <label for="nome">Categoria:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nova Categoria" required>
            </div>
            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    </div>
</div>
@endsection
