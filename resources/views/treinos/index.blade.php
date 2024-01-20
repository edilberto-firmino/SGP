@extends('layouts.dashboard')

@section('title', 'Lista de Treinos')

@section('content')

    <h2 class="mb-4">Lista de Treinos</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('treinos.create') }}" class="btn btn-success mb-3">Novo Treino</a>

    @if (count($treinos) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Descrição</th>
                    <!-- Adicione mais colunas conforme necessário -->
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($treinos as $treino)
                    <tr>
                        <td>{{ $treino->data }}</td>
                        <td>{{ $treino->descricao }}</td>
                        <!-- Adicione mais colunas conforme necessário -->
                        <td>
                            <a href="{{ route('treinos.edit', $treino->id) }}" class="btn btn-primary">Editar</a>
                            <a href="{{ route('treinos.show', $treino->id) }}" class="btn btn-info">Ver</a>
                            <form action="{{ route('treinos.destroy', $treino->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nenhum treino registrado ainda.</p>
    @endif

@endsection
