
@extends('layout')

@section('content')
<div class="container">
    <h1 class="my-4">Lista de Metas Financeiras</h1>
    <a href="{{ route('metas.create') }}" class="btn btn-primary mb-3">Adicionar Nova Meta</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tipo de Meta</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($metas as $meta)
                <tr>
                    <td>{{ $meta->tipo_meta }}</td>
                    <td>{{ $meta->valor_meta }}</td>
                    <td>{{ $meta->status }}</td>
                    <td>
                        <a href="{{ route('metas.edit', $meta->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('metas.destroy', $meta->id) }}" method="POST" style="display:inline">
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
