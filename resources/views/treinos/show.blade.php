@extends('layouts.dashboard')

@section('content')

    <h1>Detalhes do Treino</h1>

    <p>Data: {{ $treino->data }}</p>
    <p>Descrição: {{ $treino->descricao }}</p>

    <a href="{{ route('treinos.edit', $treino->id) }}" class="btn btn-warning">Editar</a>

    <form action="{{ route('treinos.destroy', $treino->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Excluir</button>
        <a href="{{ route('treinos.index') }}" class="btn btn-info">Voltar</a>
    </form>

@endsection
