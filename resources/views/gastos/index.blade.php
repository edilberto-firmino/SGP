@extends('layouts.dashboard')

@section('content')

    <h2 class="mb-4">Lista de Gastos</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botão para criar novo gasto -->
    <a href="{{ route('gastos.create') }}" class="btn btn-success mb-3">Criar Novo Gasto</a>

    @if (count($gastos) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Data</th>
                    <th>Valor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gastos as $gasto)
                    <tr>
                        <td>{{ $gasto->descricao }}</td>
                        <td>{{ \Carbon\Carbon::parse($gasto->data)->format('d/m/Y') }}</td>
                        <td>{{ $gasto->valor }}</td>
                        <td>
                            <a href="{{ route('gastos.edit', $gasto->id) }}" class="btn btn-primary">Editar</a>
                            <a href="{{ route('gastos.show', $gasto->id) }}" class="btn btn-info">Ver</a>
                            <form action="{{ route('gastos.destroy', $gasto->id) }}" method="POST" style="display:inline">
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
        <p>Nenhum gasto registrado ainda.</p>
    @endif

@endsection
