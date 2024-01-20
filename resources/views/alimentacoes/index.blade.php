@extends('layouts.dashboard')

@section('content')

    <h2 class="mb-4">Lista de Alimentações</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botão para criar nova alimentação -->
    <a href="{{ route('alimentacoes.create') }}" class="btn btn-success mb-3">Nova Alimentação</a>

    @if (count($alimentacoes) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Descrição</th>
                    <th>Calorias</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alimentacoes as $alimentacao)
                    <tr>
                        <td>{{ $alimentacao->data }}</td>
                        <td>{{ $alimentacao->descricao }}</td>
                        <td>{{ $alimentacao->calorias }}</td>
                        <td>
                            <a href="{{ route('alimentacoes.edit', $alimentacao->id) }}" class="btn btn-primary">Editar</a>
                            <a href="{{ route('alimentacoes.show', $alimentacao->id) }}" class="btn btn-info">Ver</a>
                            <form action="{{ route('alimentacoes.destroy', $alimentacao->id) }}" method="POST" style="display:inline">
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
        <p>Nenhuma alimentação registrada ainda.</p>
    @endif

@endsection
