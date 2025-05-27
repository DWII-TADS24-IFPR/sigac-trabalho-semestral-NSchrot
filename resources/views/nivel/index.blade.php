@extends('layout.app')

@section('content')
<div class="container">
    <h1>Níveis</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('niveis.create') }}" class="btn btn-primary mb-3">Criar Novo Nível</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($niveis as $nivel)
                <tr>
                    <td>{{ $nivel->id }}</td>
                    <td>{{ $nivel->nome }}</td>
                    <td>
                        <a href="{{ route('niveis.show', $nivel) }}" class="btn btn-info">Visualizar</a>
                        <a href="{{ route('niveis.edit', $nivel) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('niveis.destroy', $nivel) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este nível?');">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection