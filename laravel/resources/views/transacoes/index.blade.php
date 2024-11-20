@extends('layout')

@section('content')

<div class="form-container" style="width: 100%;">
<h1 class="my-4">Lista de Transações</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="user-form">
            <!-- Botões de Ação -->
            <div class="mb-3">
                <a href="{{ route('transacoes.create') }}" class="btn btn-primary">Nova Transação</a>
                <a href="{{ route('transacoes.relatorio', ['usuario_id' => auth()->id()]) }}" class="btn btn-info">Relatório</a>
            </div>
        
            
        
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
                                <td class="{{ $transacao->tipo == 'Credito' ? 'credito' : 'debito' }}">
                                    {{ $transacao->tipo }}
                                </td>
                                <td>{{ 'R$ ' . number_format($transacao->valor, 2, ',', '.') }}</td>
                                
                                <!-- Formatação de data usando Carbon -->
                                <td>{{ \Carbon\Carbon::parse($transacao->data)->translatedFormat('d \\d\\e F \\d\\e Y') }}</td>
        
        
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
</div>
@endsection