@extends('layout') <!-- Use o layout que você configurou -->

@section('content') <!-- Define o conteúdo a ser injetado no layout -->
    <div class="container">
        <h1 class="my-4">Bem-vindo ao Sistema de Controle Financeiro</h1>
        <p>Use o menu acima para navegar pelas transações, metas financeiras e categorias.</p>
        <a href="{{ route('registroForm') }}" class="btn btn-primary">Registrar</a>
        <a href="{{ route('loginForm') }}" class="btn btn-primary">Login</a>
    </div>   
     
@endsection
