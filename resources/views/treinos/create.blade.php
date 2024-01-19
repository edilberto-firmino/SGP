@extends('layouts.dashboard')

@section('content')

    <h1>Criar Novo Treino</h1>

    <form action="{{ route('treinos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="data">Data:</label>
            <input type="date" class="form-control" name="data" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" class="form-control" name="descricao" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Treino</button>
        <a href="{{ route('treinos.index') }}" class="btn btn-info">Voltar</a>
    </form>

@endsection
