
@extends('layout')

@section('content')
<div class="form-container">
    <div class="container">
        <h1 class="my-4">Relatório de Transações</h1>
        <div class="user-form">

            <!-- Formulário de Filtro por Data -->
            <form method="GET">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="data_inicio">Data de Início</label>
                        <input type="date" id="data_inicio" name="data_inicio" class="form-control" value="{{ request('data_inicio') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="data_fim">Data de Fim</label>
                        <input type="date" id="data_fim" name="data_fim" class="form-control" value="{{ request('data_fim') }}">
                    </div>
                    <div class="form-group col-md-4 align-self-end">
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                    </div>
                </div>
            </form>
    
            <div class="table-responsive">
                <!-- Tabela de Transações -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tipo</th>
                            <th>Valor</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tbody>
                            @foreach($transacoes as $transacao)
                                <tr >
    
                                    <!-- Aplica a classe CSS dependendo do valor do tipo -->
                                    <td class="{{ $transacao->tipo == 'Credito' ? 'credito' : 'debito' }}">
                                        {{ $transacao->tipo }}
                                    </td>
    
                                    <td>{{ 'R$ ' . number_format($transacao->valor, 2, ',', '.') }}</td>
                            
                                    <td>{{ \Carbon\Carbon::parse($transacao->data)->translatedFormat('d \\d\\e F \\d\\e Y') }}</td>
    
                                </tr>
                            @endforeach
                        </tbody>
                    </tbody>
                </table>
            </div>
            
    
            <!-- Exibir os totais de Crédito, Débito e Diferença -->
            <div class="my-4 " ><br>
                <h4>Total de Crédito: <span class="text-success">R$ {{ number_format($transacoes_credito, 2, ',', '.') }}</span></h4>
                <h4>Total de Débito: <span class="text-danger">R$ {{ number_format($transacoes_debito, 2, ',', '.') }}</span></h4>
                <h4>Diferença: 
                    <span class="{{ $diferenca >= 0 ? 'text-success' : 'text-danger' }}">
                        R$ {{ number_format($diferenca, 2, ',', '.') }}
                    </span>
                </h4>
            </div>
        </div>

    </div>
</div>
@endsection
