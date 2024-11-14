@extends('layout')

@section('content')
<div class="container">
    <h1 class="my-4">Login</h1>
    <h4>Ainda nao registrado? 
        <a href="{{ route('registroForm') }}" class="btn btn-primary">Registrar</a>
    </h4>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
@endsection
