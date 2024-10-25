
@extends('layout')

@section('content')
<div class="container">
    <h1 class="my-4">Lista de Transações</h1>
    <a href="{{ route('transacoes.create') }}" class="btn btn-primary mb-3">Adicionar Nova Transação</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Data</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transacoes as $transacao)
                <tr>
                    <td>{{ $transacao->tipo }}</td>
                    <td>{{ $transacao->valor }}</td>
                    <td>{{ $transacao->data }}</td>
                    <td>{{ $transacao->categoria }}</td>
                    <td>
                        <a href="{{ route('transacoes.edit', $transacao->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('transacoes.destroy', $transacao->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
