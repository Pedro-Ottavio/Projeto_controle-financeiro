<!DOCTYPE html>
<html>
<head>
    <title>Bem-vindo ao Sistema de Controle Financeiro</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @extends('layout')
    @section('content')
    <div class="container">
        <h1 class="my-4">Bem-vindo ao Sistema de Controle Financeiro</h1>
        <p>Use o menu acima para navegar pelas transações, metas financeiras e categorias.</p>
        <a href="{{ route('registroForm') }}" class="btn btn-primary">Registrar</a>
        <a href="{{ route('loginForm') }}" class="btn btn-secondary">Login</a>
    </div>
    @endsection

</body>
</html>
